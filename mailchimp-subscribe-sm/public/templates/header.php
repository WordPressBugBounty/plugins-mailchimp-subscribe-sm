<?php if ( ! defined( 'ABSPATH' ) ) exit;

//include 'temp-functions.php';

$loadWpHead = $data['pageOptions']['loadWpHead'];
$loadWpFooter = $data['pageOptions']['loadWpFooter'];
$pageBgImage = $data['pageOptions']['pageBgImage'];
$pageBgColor = $data['pageOptions']['pageBgColor'];
$pagePadding = $data['pageOptions']['pagePadding'];
$pagePaddingTop = $pagePadding['pagePaddingTop'];
$pagePaddingBottom = $pagePadding['pagePaddingBottom'];
$pagePaddingLeft = $pagePadding['pagePaddingLeft'];
$pagePaddingRight = $pagePadding['pagePaddingRight'];

if (isset($data['pageOptions']['pageFavIconUrl'])) {
  $pageFavIconUrl = $data['pageOptions']['pageFavIconUrl'];
}
if (isset($data['pageOptions']['pageLogoUrl'])) {
  $pageLogoUrl = $data['pageOptions']['pageLogoUrl'];
}

if (isset($data['pageOptions']['POcustomCSS'])) {
  $POcustomCSS = $data['pageOptions']['POcustomCSS'];
}

$POPBDefaultsEnable = '';
if (isset($data['pageOptions']['POPBDefaults'])) {
  $POPBDefaults = $data['pageOptions']['POPBDefaults'];
  $POPBDefaultsEnable = $POPBDefaults['POPBDefaultsEnable'];
  $POPB_typefaces = $POPBDefaults['POPB_typefaces'];
  $POPB_typeSizes = $POPBDefaults['POPB_typeSizes'];
}


if (isset($data['pageOptions']['pagePaddingTablet'])) {
  
  $pagePaddingTablet = $data['pageOptions']['pagePaddingTablet'];
  $pagePaddingMobile = $data['pageOptions']['pagePaddingMobile'];


          $POPBPagePaddingResponsiveTablet = "\n".

            '.ulpb_PageBody'.$current_pageID.' { padding-top:'.$pagePaddingTablet['pagePaddingTopTablet'].'%; padding-bottom:'.$pagePaddingTablet['pagePaddingBottomTablet'].'%; padding-left:'.$pagePaddingTablet['pagePaddingLeftTablet'].'%; padding-right:'.$pagePaddingTablet['pagePaddingRightTablet'].'%;  }  '.
            ' ';

          $POPBPagePaddingResponsiveMobile = "\n".

            '.ulpb_PageBody'.$current_pageID.' { padding-top:'.$pagePaddingMobile['pagePaddingTopMobile'].'%; padding-bottom:'.$pagePaddingMobile['pagePaddingBottomMobile'].'%; padding-left:'.$pagePaddingMobile['pagePaddingLeftMobile'].'%; padding-right:'.$pagePaddingMobile['pagePaddingRightMobile'].'%;  }  '.
            ' ';

            array_push($POPBNallRowStylesResponsiveTablet, $POPBPagePaddingResponsiveTablet);
            array_push($POPBNallRowStylesResponsiveMobile, $POPBPagePaddingResponsiveMobile);
}


if (isset($data['pageOptions']['POcustomJS'])) {
  $POcustomJS = $data['pageOptions']['POcustomJS'];
}



$pbLocale = get_locale();


if ($current_postType == 'post' || $current_postType == 'page' || $isShortCodeTemplate == true ){} else{ echo "<head>"; }


wp_enqueue_style( 'pluginops-landingpage-style-css', SMFB_PLUGIN_URL.'/public/templates/style.css', array(), '1.0', $media = 'all' );

?>


<style type="text/css">
  <?php if (!empty($pageBgImage) ) {
      ?>
      .ulpb_PageBody<?php echo $current_pageID; ?>{
      background:url("<?php echo $pageBgImage; ?>")no-repeat center center; background-size:cover;
      }
      <?php
      
    } ?>
  <?php if (!empty($pageBgColor)){
    if (isset($isShortCodeTemplate)) {
      ?>
        .ulpb_PageBody<?php echo $current_pageID; ?>{
          background-color: <?php echo $pageBgColor; ?> ;
        }
      <?php
    }
  }
    if (isset($isShortCodeTemplate)) {
      if ($isShortCodeTemplate == true) {
        ?>
        .ulpb_PageBody<?php echo $current_pageID; ?>{
          padding: <?php echo "$pagePaddingTop"."% $pagePaddingRight"."% $pagePaddingBottom"."% $pagePaddingLeft"."%"; ?>;
        }
        <?php  
        if ($pagePaddingRight != '0' && $pagePaddingLeft != '0') {
          if ( $pagePaddingRight != '' && $pagePaddingLeft != '') {
          ?>
            @media screen and (max-width: 1310px) {
              .ulpb_PageBody<?php echo $current_pageID; ?> {padding-left: 3% !important; padding-right: 3% !important; }
            }
        <?php
          }
        }
      }
    }
      
    ?>
  
  .ulpb_PageBody<?php echo $current_pageID; ?>{
      padding: <?php echo "$pagePaddingTop"."% $pagePaddingRight"."% $pagePaddingBottom"."% $pagePaddingLeft"."%"; ?>;
      position: relative;
      clear: both;
      <?php if ( $selectedOptinType == 'Full Page'): ?>
        background: none !important;
      <?php endif ?>
  }


  <?php

  $bodyBackgroundOptions = "background:url($pageBgImage) no-repeat center center; background-size:cover; background-color:$pageBgColor ; ";

  if (isset($data['pageOptions']['bodyBackgroundType'])) {
   if ($data['pageOptions']['bodyBackgroundType'] == 'gradient') {
    $bodyGradient = $data['pageOptions']['bodyGradient'];
    if ($bodyGradient['bodyGradientType'] == 'linear') {
     $bodyBackgroundOptions = 'background: linear-gradient(' . $bodyGradient['bodyGradientAngle'] . 'deg, ' . $bodyGradient['bodyGradientColorFirst'] . ' ' . $bodyGradient['bodyGradientLocationFirst'] . '%,' . $bodyGradient['bodyGradientColorSecond'] . ' ' . $bodyGradient['bodyGradientLocationSecond'] . '%) ;';
    }

    if ($bodyGradient['bodyGradientType'] == 'radial') {
     $bodyBackgroundOptions = 'background: radial-gradient(at ' . $bodyGradient['bodyGradientPosition'] . ', ' . $bodyGradient['bodyGradientColorFirst'] . ' ' . $bodyGradient['bodyGradientLocationFirst'] . '%,' . $bodyGradient['bodyGradientColorSecond'] . ' ' . $bodyGradient['bodyGradientLocationSecond'] . '%) ;';
    }
   }
  }

  $bodyOverlayBackgroundOptions = '';

  if (isset($data['pageOptions']['bodyBgOverlayColor'])) {
   $bodyOverlayBackgroundOptions = " background:" . $data['pageOptions']['bodyBgOverlayColor'] . " ; background-color:" . $data['pageOptions']['bodyBgOverlayColor'] . " ;";
  }

  $thisbodyHoverOption = '';

  if (isset($data['pageOptions']['bodyHoverOptions'])) {
   $bodyHoverOptions = $data['pageOptions']['bodyHoverOptions'];

    if (isset($bodyHoverOptions['bodyBackgroundTypeHover'])) {
      if ($bodyHoverOptions['bodyBackgroundTypeHover'] == 'solid') {
        $thisbodyHoverOption = ' .ulpb_PageBody' . $current_pageID . ':hover { background:' . $bodyHoverOptions['bodyBgColorHover'] . ' !important; transition: all ' . $bodyHoverOptions['bodyHoverTransitionDuration'] . 's; }';
      }

      if ($bodyHoverOptions['bodyBackgroundTypeHover'] == 'gradient') {
        $bodyGradientHover = $bodyHoverOptions['bodyGradientHover'];
        if ($bodyGradientHover['bodyGradientTypeHover'] == 'linear') {
          $thisbodyHoverOption = ' .ulpb_PageBody' . $current_pageID . ':hover { background: linear-gradient(' . $bodyGradientHover['bodyGradientAngleHover'] . 'deg, ' . $bodyGradientHover['bodyGradientColorFirstHover'] . ' ' . $bodyGradientHover['bodyGradientLocationFirstHover'] . '%,' . $bodyGradientHover['bodyGradientColorSecondHover'] . ' ' . $bodyGradientHover['bodyGradientLocationSecondHover'] . '%) !important; transition: all ' . $bodyHoverOptions['bodyHoverTransitionDuration'] . 's; }';
        }

        if ($bodyGradientHover['bodyGradientTypeHover'] == 'radial') {
        $thisbodyHoverOption = ' .ulpb_PageBody' . $current_pageID . ':hover { background: radial-gradient(at ' . $bodyGradientHover['bodyGradientPositionHover'] . ', ' . $bodyGradientHover['bodyGradientColorFirstHover'] . ' ' . $bodyGradientHover['bodyGradientLocationFirstHover'] . '%,' . $bodyGradientHover['bodyGradientColorSecondHover'] . ' ' . $bodyGradientHover['bodyGradientLocationSecondHover'] . '%) !important; transition: all ' . $bodyHoverOptions['bodyHoverTransitionDuration'] . 's; }';
        }
      }
    }
    
  }

  if (isset($data['pageOptions']['bodyOverlayBackgroundType'])) {
   if ($data['pageOptions']['bodyOverlayBackgroundType'] == 'gradient') {
    $bodyOverlayGradient = $data['pageOptions']['bodyOverlayGradient'];
    if ($bodyOverlayGradient['bodyOverlayGradientType'] == 'linear') {
     $bodyOverlayBackgroundOptions = 'background: linear-gradient(' . $bodyOverlayGradient['bodyOverlayGradientAngle'] . 'deg, ' . $bodyOverlayGradient['bodyOverlayGradientColorFirst'] . ' ' . $bodyOverlayGradient['bodyOverlayGradientLocationFirst'] . '%,' . $bodyOverlayGradient['bodyOverlayGradientColorSecond'] . ' ' . $bodyOverlayGradient['bodyOverlayGradientLocationSecond'] . '%) ;';
    }

    if ($bodyOverlayGradient['bodyOverlayGradientType'] == 'radial') {
     $bodyOverlayBackgroundOptions = 'background: radial-gradient(at ' . $bodyOverlayGradient['bodyOverlayGradientPosition'] . ', ' . $bodyOverlayGradient['bodyOverlayGradientColorFirst'] . ' ' . $bodyOverlayGradient['bodyOverlayGradientLocationFirst'] . '%,' . $bodyOverlayGradient['bodyOverlayGradientColorSecond'] . ' ' . $bodyOverlayGradient['bodyOverlayGradientLocationSecond'] . '%) ;';
    }
   }
  }

  $bodyBorderOptions = '';
  if (isset($data['pageOptions']['bodyBorderWidth']) ) {
    $bodyBorderOptions = "border:".$data['pageOptions']['bodyBorderWidth']."px ".$data['pageOptions']['bodyBorderType']." ".$data['pageOptions']['bodyBorderColor']."; ";
  }


  if (isset($data['pageOptions']['bodyBorderRadius']['bbrt']) ) {
    $bodyBorderRadius = $data['pageOptions']['bodyBorderRadius'];
    $bodyBorderOptions = $bodyBorderOptions.'  border-radius: '.$bodyBorderRadius['bbrt'].'px '.$bodyBorderRadius['bbrr'].'px '.$bodyBorderRadius['bbrb'].'px '.$bodyBorderRadius['bbrl'].'px ;';
  }else{
    $bodyBorderOptions = $bodyBorderOptions. "border-radius: ".$data['pageOptions']['bodyBorderRadius']."px;";
  }

  ?>

  .ulpb_PageBody<?php echo $current_pageID; 
  echo "{ $bodyBackgroundOptions   $bodyBorderOptions }";

  echo " #fullPageBgOverlay_$current_pageID { $bodyOverlayBackgroundOptions }";

  echo "$thisbodyHoverOption";
  ?>
</style>


<!-- Custom head styling  -->
<style type="text/css">
  

  <?php 
    if (isset($POcustomCSS)) {
      echo "$POcustomCSS";
    }
  ?>
</style>

<!-- Custom head script  -->
<script>
  <?php 
    if (isset($POcustomJS)) {
      echo "$POcustomJS";
    }
  ?>
</script>

<?php


        if ($POPBDefaultsEnable == 'true') {

          array_push($thisColFontsToLoad, $POPB_typefaces['typefaceHOne']);
          array_push($thisColFontsToLoad, $POPB_typefaces['typefaceHTwo']);
          array_push($thisColFontsToLoad, $POPB_typefaces['typefaceParagraph']);
          array_push($thisColFontsToLoad, $POPB_typefaces['typefaceButton']);
          array_push($thisColFontsToLoad, $POPB_typefaces['typefaceAnchorLink']);

          $POPBGlobalStylesTag = "\n".

            '.ulpb_PageBody'.$current_pageID.' h1 { font-family:'.str_replace('+',' ',$POPB_typefaces['typefaceHOne']).'; font-size:'.$POPB_typeSizes['typeSizeHOne'].'px; }  '.

            '.ulpb_PageBody'.$current_pageID.' h2 { font-family:'.str_replace('+',' ',$POPB_typefaces['typefaceHTwo']).'; font-size:'.$POPB_typeSizes['typeSizeHTwo'].'px; }  '.

            '.ulpb_PageBody'.$current_pageID.' p { font-family:'.str_replace('+',' ',$POPB_typefaces['typefaceParagraph']).'; font-size:'.$POPB_typeSizes['typeSizeParagraph'].'px; }  '.

            '.ulpb_PageBody'.$current_pageID.' button { font-family:'.str_replace('+',' ',$POPB_typefaces['typefaceButton']).'; font-size:'.$POPB_typeSizes['typeSizeButton'].'px; }  '.
            
            '.ulpb_PageBody'.$current_pageID.' a { font-family:'.str_replace('+',' ',$POPB_typefaces['typefaceAnchorLink']).'; font-size:'.$POPB_typeSizes['typeSizeAnchorLink'].'px; } ';

          echo '<style type="text/css" id="POPBGlobalStylesTag">'.$POPBGlobalStylesTag.'</style>'."\n";


          if (isset($POPB_typeSizes['typeSizeHOneTablet'])) {

            $POPBGlobalStylesResponsiveTablet = "\n".

              '.ulpb_PageBody'.$current_pageID.' h1 { font-size:'.$POPB_typeSizes['typeSizeHOneTablet'].'px !important; }  '.

              '.ulpb_PageBody'.$current_pageID.' h2 { font-size:'.$POPB_typeSizes['typeSizeHTwoTablet'].'px !important; }  '.

              '.ulpb_PageBody'.$current_pageID.' p { font-size:'.$POPB_typeSizes['typeSizeParagraphTablet'].'px !important; }  '.

              '.ulpb_PageBody'.$current_pageID.' button { font-size:'.$POPB_typeSizes['typeSizeButtonTablet'].'px !important; }  '.
              
              '.ulpb_PageBody'.$current_pageID.' a {  font-size:'.$POPB_typeSizes['typeSizeAnchorLinkTablet'].'px !important; } '.
              ' ';

            $POPBGlobalStylesResponsiveMobile = "\n".

              '.ulpb_PageBody'.$current_pageID.' h1 { font-size:'.$POPB_typeSizes['typeSizeHOneMobile'].'px !important; }  '.

              '.ulpb_PageBody'.$current_pageID.' h2 { font-size:'.$POPB_typeSizes['typeSizeHTwoMobile'].'px !important; }  '.

              '.ulpb_PageBody'.$current_pageID.' p { font-size:'.$POPB_typeSizes['typeSizeParagraphMobile'].'px !important; }  '.

              '.ulpb_PageBody'.$current_pageID.' button { font-size:'.$POPB_typeSizes['typeSizeButtonMobile'].'px !important; }  '.
              
              '.ulpb_PageBody'.$current_pageID.' a {  font-size:'.$POPB_typeSizes['typeSizeAnchorLinkMobile'].'px !important; } '.
              ' ';

              array_push($POPBNallRowStylesResponsiveTablet, $POPBGlobalStylesResponsiveTablet);
              array_push($POPBNallRowStylesResponsiveMobile, $POPBGlobalStylesResponsiveMobile);

          }

        }

?>




<?php 

if ($current_postType == 'post' || $current_postType == 'page' || $isShortCodeTemplate == true ){} else{ echo "</head>"; }

if ( function_exists('smfb_available_pro_widgets') ) { echo " <!--- PluginOps User Type - 1 --->"; } else { echo " <!--- PluginOps User Type - 0 --->";}


$pluginOpsCheckElViewFrameScript = '';

?>
