<?php
class SiteUtil
{
  public static function createDirByPath($parentDir, $dirPath) {
    $dirPath = trim($dirPath, '/');
    $arDir = explode('/', $dirPath);
    foreach($arDir as $dir) {
      $parentDir .= '/' . $dir;
      if(!file_exists($parentDir)) {
        mkdir($parentDir, 0775);
      }
    }
  }

  public static function getWebP($src, $params = []) {
    $srcAbs = $_SERVER['DOCUMENT_ROOT'] . $src;

    if(
      !$src ||
      !file_exists($srcAbs)
    ) {
      return false;
    }

    $srcSize = getimagesize($srcAbs);
    $srcFilemtime = filemtime($srcAbs);
    $srcPathinfo = pathinfo($src);
    if($srcPathinfo['extension'] == 'webp') {
      return [
        'TYPE' => $srcSize['mime'],
        'WIDTH' => $srcSize[0],
        'HEIGHT' => $srcSize[1],
        'SRC' => $src,
        'TIMESTAMP' => $srcFilemtime,
      ];
    }

    $quality = 100;
    if(isset($params['QUALITY'])) {
      $qualityTmp = (int) $params['QUALITY'];
      if(
        $qualityTmp > 0 &&
        $qualityTmp <= 100
      ) {
        $quality = $qualityTmp;
      }
    }

    $params['WIDTH'] = $params['WIDTH'] ? (int) $params['WIDTH'] : false;
    $params['HEIGHT'] = $params['HEIGHT'] ? (int) $params['HEIGHT'] : false;
    $webpDirPath = '/webp/' .
      ($params['WIDTH'] ? 'w' . $params['WIDTH'] . '_' : '') .
      ($params['HEIGHT'] ? 'h' . $params['HEIGHT'] . '_' : '') .
      'q' . $quality .
      $srcPathinfo['dirname'];

    $webpFilePath = '/upload' . $webpDirPath . '/' . $srcPathinfo['filename'] . '.webp';
    $webpFilePathAbs = $_SERVER['DOCUMENT_ROOT'] . $webpFilePath;

    if(file_exists($webpFilePathAbs)) {
      $webpFilemtime = filemtime($webpFilePathAbs);
      if(
        $webpFilemtime >= $srcFilemtime
        && filesize($webpFilePathAbs) > 0
      ) {
        return [
          'TYPE' => $srcSize['mime'],
          'WIDTH' => $srcSize[0],
          'HEIGHT' => $srcSize[1],
          'SRC' => $webpFilePath,
          'TIMESTAMP' => $webpFilemtime,
        ];
      } else {
        unlink($webpFilePathAbs);
      }
    }

    if(
      ($fileData = file_get_contents($srcAbs)) !== false &&
      ($im = imagecreatefromstring($fileData)) !== false
    ) {
      self::createDirByPath($_SERVER['DOCUMENT_ROOT'] . '/upload', $webpDirPath);

      try {
        $width = $srcSize[0];
        $height = $srcSize[1];
        $widthNew = $width;
        $heightNew = $height;

        if(
          $params['WIDTH'] ||
          $params['HEIGHT']
        ) {
          if(
            $params['WIDTH'] &&
            $params['WIDTH'] < $widthNew
          ) {
            $widthNew = $params['WIDTH'];
            $heightNew = round($height * $widthNew / $width);
          }

          if(
            $params['HEIGHT'] &&
            $params['HEIGHT'] < $heightNew
          ) {
            $heightNew = $params['HEIGHT'];
            $widthNew = round($width * $heightNew / $height);
          }
        }

        imagealphablending($im, false);
        imagesavealpha($im, true);
        $dest = imagecreatetruecolor($widthNew, $heightNew);
        imagealphablending($dest, false);
        imagesavealpha($dest, true);
        imagecopyresampled($dest, $im, 0, 0, 0, 0, $widthNew, $heightNew, $width, $height);
        imagealphablending($dest, false);
        imagedestroy($im);
        imagewebp($dest, $webpFilePathAbs, $quality);
        imagedestroy($dest);

      } catch (Exception $e) {
        imagedestroy($im);
        return false;
      }
    }

    if(file_exists($webpFilePathAbs)) {
      if(filesize($webpFilePathAbs) > 0) {
        return [
          'TYPE' => $srcSize['mime'],
          'WIDTH' => $srcSize[0],
          'HEIGHT' => $srcSize[1],
          'SRC' => $webpFilePath,
          'TIMESTAMP' => time(),
        ];
      } else {
        unlink($webpFilePathAbs);
      }
    }
    return false;
  }
}