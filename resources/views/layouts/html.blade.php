<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{env('APP_NAME','PhoneBook')}}</title>

    <!-- Bootstrap Core CSS -->
    <link href="/admin2/css/rtl/bootstrap.min.css" rel="stylesheet">

    <!-- not use this in ltr -->
    <link href="/admin2/css/rtl/bootstrap.rtl.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/admin2/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/admin2/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/admin2/css/rtl/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/admin2/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/admin2/css/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



    <link href="/admin2/css/multiple-select.css" rel="stylesheet">
</head>

<body>

@yield('body')

<!-- jQuery Version 1.11.0 -->
<script src="/admin2/js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/admin2/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/admin2/js/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="/admin2/js/raphael/raphael.min.js"></script>
<script src="/admin2/js/morris/morris.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/admin2/js/sb-admin-2.js"></script>
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function() {--}}
{{--        $('#rezaa').select();--}}
{{--    });--}}
{{--</script>--}}
<script src="/admin2/js/multiple-select.js"></script>
<script>
    new MultipleSelect('#rezaa', {
        placeholder: 'سطح دسترسی'
    })
</script>

    </body>

</html>
