$(function(){
  // alert('failover.js loaded');

  var jqxhr = $.ajax({
      type: "GET",
      url: "/failover/test"
  })
  .done(function( data ) {
      // alert( "request complete" );
      // alert( data );
      if ( data == '1' )
      {
          $('body').first().append('<div class="failover-alert">Warning: You are using a failover mirror of the site! Your changes will be lost when service is restored!</div>');
      }
  });
});