demo = {
  showNotification: function(from, align, msg , color , icon) {
    color = color;

    $.notify({
      // options
      icon: icon,
      // title: 'Bootstrap notify',
      message: msg,
      url: '',
      target: ''
    },{
      // settings
      element: 'body',
      position: null,
      type: color,
      allow_dismiss: true,
      newest_on_top: false,
      showProgressbar: true,
      placement: {
        from: from,
        align: align
      },
      offset: 20,
      spacing: 10,
      z_index: 1031,
      delay: 8000,
      timer: 1000,
      url_target: '_blank',
      mouse_over: null,
      animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
      },
      onShow: null,
      onShown: null,
      onClose: true,
      onClosed: true,
      icon_type: 'class',
      template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<div class="progress" data-notify="progressbar">' +
          '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
      '</div>' 
    });
  }

};