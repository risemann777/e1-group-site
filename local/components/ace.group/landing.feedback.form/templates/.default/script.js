BX.ready(function () {
  BX.addCustomEvent('onAjaxSuccess', function() {
    window.mainBundle.inputMask();
  });
})