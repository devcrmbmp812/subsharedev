<!doctype html>
<html>
<head>
    <!-- Meta -->


    <meta charset="utf-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/')); ?>

    <!-- Responsive -->



    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->



    <meta name="description" content="">



    <meta name="author" content="">



    <meta name="keywords" content="">

    <title>
        @yield('title')

    </title>

    <link rel="icon" href="{{url('assets/img/favicon.png')}}" type="image/png" sizes="16x16">

    <!--CSS -->
<?php


if($segments[count($segments)-1] == 'register' || $segments[count($segments)-1] == 'login'){

?>


    <link rel="stylesheet" type="text/css" href="{{url('assets/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.min.css')}}">





    <!-- Google Font -->



    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">







    <!-- Add custom CSS here -->
     <link rel="stylesheet" type="text/css" href="{{url('assets/css/style.css')}}">

     <link rel="stylesheet" type="text/css" href="{{url('assets/css/responsive.css')}}">





    <!-- Add custom JS here -->

<?php }else{?>

<link rel="stylesheet" type="text/css" href="{{url('assets/optima/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('assets/optima/css/bootstrap.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('assets/optima/css/mislider.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('assets/optima/css/mislider_demo.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('assets/optima/css/style.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('assets/optima/css/dashicons.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('assets/optima/css/thickbox.css')}}">



<!-- other pages  -->

<link rel="stylesheet" type="text/css" href="{{url('assets/optima/css/tokenfield-typeahead.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('assets/optima/css/bootstrap-tokenfield.min.css')}}">

<!-- new css files end -->

<?php }?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <script type="text/javascript" src="{{url('assets/js/custom.js')}}"></script>
<style type="text/css">

    /* cyrillic-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 300;

  src: local('Roboto Light'), local('Roboto-Light'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmSU5fCRc4EsA.woff2) format('woff2');

  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;

}

/* cyrillic */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 300;

  src: local('Roboto Light'), local('Roboto-Light'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmSU5fABc4EsA.woff2) format('woff2');

  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;

}

/* greek-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 300;

  src: local('Roboto Light'), local('Roboto-Light'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmSU5fCBc4EsA.woff2) format('woff2');

  unicode-range: U+1F00-1FFF;

}

/* greek */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 300;

  src: local('Roboto Light'), local('Roboto-Light'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmSU5fBxc4EsA.woff2) format('woff2');

  unicode-range: U+0370-03FF;

}

/* vietnamese */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 300;

  src: local('Roboto Light'), local('Roboto-Light'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmSU5fCxc4EsA.woff2) format('woff2');

  unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;

}

/* latin-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 300;

  src: local('Roboto Light'), local('Roboto-Light'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmSU5fChc4EsA.woff2) format('woff2');

  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;

}

/* latin */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 300;

  src: local('Roboto Light'), local('Roboto-Light'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmSU5fBBc4.woff2) format('woff2');

  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;

}

/* cyrillic-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 400;

  src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu72xKOzY.woff2) format('woff2');

  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;

}

/* cyrillic */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 400;

  src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu5mxKOzY.woff2) format('woff2');

  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;

}

/* greek-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 400;

  src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7mxKOzY.woff2) format('woff2');

  unicode-range: U+1F00-1FFF;

}

/* greek */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 400;

  src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu4WxKOzY.woff2) format('woff2');

  unicode-range: U+0370-03FF;

}

/* vietnamese */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 400;

  src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7WxKOzY.woff2) format('woff2');

  unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;

}

/* latin-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 400;

  src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7GxKOzY.woff2) format('woff2');

  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;

}

/* latin */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 400;

  src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu4mxK.woff2) format('woff2');

  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;

}

/* cyrillic-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 500;

  src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmEU9fCRc4EsA.woff2) format('woff2');

  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;

}

/* cyrillic */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 500;

  src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmEU9fABc4EsA.woff2) format('woff2');

  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;

}

/* greek-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 500;

  src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmEU9fCBc4EsA.woff2) format('woff2');

  unicode-range: U+1F00-1FFF;

}

/* greek */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 500;

  src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmEU9fBxc4EsA.woff2) format('woff2');

  unicode-range: U+0370-03FF;

}

/* vietnamese */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 500;

  src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmEU9fCxc4EsA.woff2) format('woff2');

  unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;

}

/* latin-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 500;

  src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmEU9fChc4EsA.woff2) format('woff2');

  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;

}

/* latin */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 500;

  src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmEU9fBBc4.woff2) format('woff2');

  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;

}

/* cyrillic-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 700;

  src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfCRc4EsA.woff2) format('woff2');

  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;

}

/* cyrillic */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 700;

  src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfABc4EsA.woff2) format('woff2');

  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;

}

/* greek-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 700;

  src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfCBc4EsA.woff2) format('woff2');

  unicode-range: U+1F00-1FFF;

}

/* greek */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 700;

  src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfBxc4EsA.woff2) format('woff2');

  unicode-range: U+0370-03FF;

}

/* vietnamese */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 700;

  src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfCxc4EsA.woff2) format('woff2');

  unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;

}

/* latin-ext */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 700;

  src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfChc4EsA.woff2) format('woff2');

  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;

}

/* latin */

@font-face {

  font-family: 'Roboto';

  font-style: normal;

  font-weight: 700;

  src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfBBc4.woff2) format('woff2');

  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;

}





/* latin-ext */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 300;

  src: local('Raleway Light'), local('Raleway-Light'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwIYqWqhPAMif.woff2) format('woff2');

  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;

}

/* latin */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 300;

  src: local('Raleway Light'), local('Raleway-Light'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwIYqWqZPAA.woff2) format('woff2');

  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;

}

/* latin-ext */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 400;

  src: local('Raleway'), local('Raleway-Regular'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptug8zYS_SKggPNyCMIT5lu.woff2) format('woff2');

  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;

}

/* latin */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 400;

  src: local('Raleway'), local('Raleway-Regular'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptug8zYS_SKggPNyC0ITw.woff2) format('woff2');

  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;

}

/* latin-ext */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 500;

  src: local('Raleway Medium'), local('Raleway-Medium'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwN4rWqhPAMif.woff2) format('woff2');

  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;

}

/* latin */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 500;

  src: local('Raleway Medium'), local('Raleway-Medium'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwN4rWqZPAA.woff2) format('woff2');

  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;

}

/* latin-ext */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 600;

  src: local('Raleway SemiBold'), local('Raleway-SemiBold'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwPIsWqhPAMif.woff2) format('woff2');

  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;

}

/* latin */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 600;

  src: local('Raleway SemiBold'), local('Raleway-SemiBold'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwPIsWqZPAA.woff2) format('woff2');

  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;

}

/* latin-ext */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 700;

  src: local('Raleway Bold'), local('Raleway-Bold'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwJYtWqhPAMif.woff2) format('woff2');

  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;

}

/* latin */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 700;

  src: local('Raleway Bold'), local('Raleway-Bold'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwJYtWqZPAA.woff2) format('woff2');

  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;

}

/* latin-ext */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 800;

  src: local('Raleway ExtraBold'), local('Raleway-ExtraBold'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwIouWqhPAMif.woff2) format('woff2');

  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;

}

/* latin */

@font-face {

  font-family: 'Raleway';

  font-style: normal;

  font-weight: 800;

  src: local('Raleway ExtraBold'), local('Raleway-ExtraBold'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwIouWqZPAA.woff2) format('woff2');

  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;

}





img.wp-smiley,

img.emoji {

    display: inline !important;

    border: none !important;

    box-shadow: none !important;

    height: 1em !important;

    width: 1em !important;

    margin: 0 .07em !important;

    vertical-align: -0.1em !important;

    background: none !important;

    padding: 0 !important;

}

</style>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
<link rel="stylesheet" type="text/css" href="{{ url('assets/optima/css/style_optimabranding.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/optima/css/responsive.css') }}">

<style type="text/css">

.recentcomments a {

 display:inline !important;

 padding:0 !important;

 margin:0 !important;

}

.featur_box h4,h3,.play_content_box h3{

color:rgb(131, 146, 167);

}

.about-body .banner-section {

 background: url("{{ url('assets/optima/images/AboutUsBanner-e1511069443806.jpg') }}");

}

p{

 color: #7f8fa4;

}

.share_box h3{

color:rgb(131, 146, 167);

}

.banner-section .banner-h{

color:rgb(131, 146, 167);

}

.fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_reposition{overflow:hidden;position:relative}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}.fb_link img{border:none}@keyframes fb_transform{from{opacity:0;transform:scale(.95)}to{opacity:1;transform:scale(1)}}.fb_animate{animation:fb_transform .3s forwards}

.fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_reset .fb_dialog_legacy{overflow:visible}.fb_dialog_advanced{padding:10px;-moz-border-radius:8px;-webkit-border-radius:8px;border-radius:8px}.fb_dialog_content{background:#fff;color:#333}.fb_dialog_close_icon{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{top:5px;left:5px;right:auto}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent}.fb_dialog_close_icon:active{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent}.fb_dialog_loader{background-color:#f6f7f9;border:1px solid #606060;font-size:24px;padding:20px}.fb_dialog_top_left,.fb_dialog_top_right,.fb_dialog_bottom_left,.fb_dialog_bottom_right{height:10px;width:10px;overflow:hidden;position:absolute}.fb_dialog_top_left{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 0;left:-10px;top:-10px}.fb_dialog_top_right{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -10px;right:-10px;top:-10px}.fb_dialog_bottom_left{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -20px;bottom:-10px;left:-10px}.fb_dialog_bottom_right{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -30px;right:-10px;bottom:-10px}.fb_dialog_vert_left,.fb_dialog_vert_right,.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{position:absolute;background:#525252;filter:alpha(opacity=70);opacity:.7}.fb_dialog_vert_left,.fb_dialog_vert_right{width:10px;height:100%}.fb_dialog_vert_left{margin-left:-10px}.fb_dialog_vert_right{right:0;margin-right:-10px}.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{width:100%;height:10px}.fb_dialog_horiz_top{margin-top:-10px}.fb_dialog_horiz_bottom{bottom:0;margin-bottom:-10px}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #365899;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{-webkit-transform:none;height:100%;margin:0;overflow:visible;position:absolute;top:-10000px;left:0;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{width:auto;height:auto;min-height:initial;min-width:initial;background:none}.fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner{width:100%}.fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content{background:none}.loading.centered #fb_dialog_loader_close{color:#fff;display:block;padding-top:20px;clear:both;font-size:18px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .45);position:absolute;bottom:0;left:0;right:0;top:0;width:100%;min-height:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_content .dialog_header{-webkit-box-shadow:white 0 1px 1px -1px inset;background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#738ABA), to(#2C4987));border-bottom:1px solid;border-color:#1d4088;color:#fff;font:14px Helvetica, sans-serif;font-weight:bold;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{-webkit-font-smoothing:subpixel-antialiased;height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#4966A6), color-stop(.5, #355492), to(#2A4887));border:1px solid #29487d;-webkit-background-clip:padding-box;-webkit-border-radius:3px;-webkit-box-shadow:rgba(0, 0, 0, .117188) 0 1px 1px inset, rgba(255, 255, 255, .167969) 0 1px 0;display:inline-block;margin-top:3px;max-width:85px;line-height:18px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{border:none;background:none;color:#fff;font:12px Helvetica, sans-serif;font-weight:bold;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #555;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f6f7f9;border:1px solid #555;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_button{text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}#fb_dialog_loader_spinner{animation:rotateSpinner 1.2s linear infinite;background-color:transparent;background-image:url(https://static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);background-repeat:no-repeat;background-position:50% 50%;height:24px;width:24px}@keyframes rotateSpinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}

.fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_hide_iframes iframe{position:relative;left:-10000px}.fb_iframe_widget_loader{position:relative;display:inline-block}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}.fb_iframe_widget_loader iframe{min-height:32px;z-index:2;zoom:1}.fb_iframe_widget_loader .FB_Loader{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat;height:32px;width:32px;margin-left:-16px;position:absolute;left:50%;z-index:4}

.fb_customer_chat_bounce_in{animation-duration:250ms;animation-name:fb_bounce_in}.fb_customer_chat_bounce_out{animation-duration:250ms;animation-name:fb_fade_out}.fb_invisible_flow{display:inherit;height:0;overflow-x:hidden;width:0}.fb_mobile_overlay_active{height:100%;overflow:hidden;position:fixed;width:100%}@keyframes fb_fade_out{from{opacity:1}to{opacity:0}}@keyframes fb_bounce_in{0%{opacity:0;transform:scale(.8, .8);transform-origin:100% 100%}10%{opacity:.1}20%{opacity:.2}30%{opacity:.3}40%{opacity:.4}50%{opacity:.5}60%{opacity:.6}70%{opacity:.7}80%{opacity:.8;transform:scale(1.03, 1.03)}90{opacity:.9}100%{opacity:1;transform:scale(1, 1)}}background-attachment:

</style>





</head>







@if( Request::is('neptune'))

      <body class="page-template page-template-template-naptune page-template-template-naptune-php page page-id-415 land-body-class">

@elseif( Request::is('ripple'))
     <body class="page-template page-template-template-ripple page-template-template-ripple-php page page-id-210 ripple-body">

@elseif($segments[count($segments)-1] == 'register' || $segments[count($segments)-1] == 'login' || $segments[count($segments)-1] == 'reset')
     <body class="home-area login_page_body">


@elseif( Request::is('/'))
<!-- home page -->
<body class="home page-template page-template-template-home page-template-template-home-php page page-id-6 home_body">

@else

     <body class="post-template-default single single-post postid-91 single-format-standard home-area" style="background: none repeat scroll 0 0 #ecf0f3 !important;">

	   <!-- default home body -->
@endif





    <!--TOP MENU: START-->

        @include('layouts.sections.guest.top_menu')

    <!--TOP MENU: END -->

    <!--content : START -->

        @yield('content')

    <!--content : END -->



    @if (\Route::current()->getName() != 'login' && \Route::current()->getName() != 'register' && \Route::current()->getName() != 'password.request'   )



        <!-- footer : start -->

        @include('layouts.sections.guest.footer')

        <!-- footer : END -->



    @endif

<!--Content Ends -->

<script type="text/javascript" src="{{url('assets/js/bootstrap-notify.js')}}"></script>

<script type="text/javascript" src="{{url('assets/js/bootstrap.min.js')}}"></script>

<script type="text/javascript" src="http://optima5.com/Subshare/f/js/mislider.min.js"></script>

<script type="text/javascript">

    jQuery(function ($) {

        var slider = $('.mis-stage').miSlider({

            slidesOnStage: false,

            slidePosition: 'center',

            slideStart: 'mid',

            slideScaling: 150,

            offsetV: -0,

            centerV: true,

            navButtonsOpacity: 1,

            pause: true

        });

    });

</script>
<?php if($segments[count($segments)-1] == 'login'){?>
    <script>
         $('.login_bs').css('font-weight','bold');
    </script>
<?php }else if($segments[count($segments)-1] == 'register'){ ?>
     <script>
         $('.register_bs').css('font-weight','bold');
    </script>
<?php } ?>

<script type="text/javascript" src="{{url('assets/js/bootstrap-notify.js')}}"></script>
<script>
$(window).on('load',function () {
create_notifications();
    setInterval(create_notifications, 10000);
});
function create_notifications() {
    var call_url = "{{url('/fetchNotification')}}";
    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': "{{ csrf_token() }}"
			}
		});
		$.ajax({
			dataType: 'json',
			 type:'POST',
			url: call_url,
			async:true,
			data: {}
		}).done(function(data){
		if(data != "no") {
		            for (var i = 0; i < data.length; i++) {
		                var print = 'Subshare Created <br>  Agreement : ' + data[i].custom_agreement + ' | Percentage : ' + data[i].percentage + '';
		                live_notify(print, data[i].id);
		            }
		        }
		});

}
function live_notify(data,id){
    $.notify('<div class="alert_box"><a href="#"><span class="icon_box"><i class="fa fa-bell"></i></span> <span class="notify_txt" style="height: 25px; width:100%; overflow: hidden !important; font-size: 10px; padding: 0px; !important; margin-top:0px;"> '+ data +' </span></a></div>', {
        allow_dismiss: false,
        type: 'default',
        placement: {
            from: 'bottom',
            align: 'left'
        }
    });
    setTimeout(function() {
        $.notifyClose('top-right');
    }, 2000000);
}
</script>
</body>
</html>