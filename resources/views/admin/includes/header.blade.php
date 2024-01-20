<!DOCTYPE html>

<html
  lang="ar" class="light-style layout-navbar-fixed layout-menu-fixed"  dir="ltr"   data-theme="theme-default"  data-assets-path="{{asset('assets')}}/"  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets')}}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/libs/dropzone/dropzone.css" />

    <!-- Page CSS -->


    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "dd40012d-ec44-4175-bb2c-4ffedd3f4d34",
                safari_web_id: "web.onesignal.auto.002ea938-3ebd-4740-ada1-6c17c5eb4600",
                notifyButton: {
                    enable: true,
                },
            });
        });
        OneSignal.push(function() {
            OneSignal.getUserId(function(userId) {
                console.log("OneSignal User ID:", userId);
                $.ajax({
                    type:'POST',
                    url:'{{ route("admin.updaye_player_id") }}',
                    data:{
                            '_token' : '<?php echo csrf_token() ?>',
                            'userId' : userId,
                    },
                    success:function(response) {
                        console.log(response.data);
                    }
                });
                // (Output) OneSignal User ID: 270a35cd-4dda-4b3f-b04e-41d7463a2316
            });
        });

        OneSignal.push(["addListenerForNotificationOpened", function(data) {
            console.log("Received NotificationOpened:");
            console.log(data);
        }]);
        document.addEventListener("desktop notification", function(){
            alert("desktop notification");
        });
    </script>

    <!-- Helpers -->
    <script src="{{asset('assets')}}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('assets')}}/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets')}}/js/config.js"></script>

        {{--noty--}}
        <link rel="stylesheet" href="{{ asset('assets/noty/noty.css') }}">
        <script src="{{ asset('assets/noty/noty.min.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
