<?php  if ( ! defined( 'ABSPATH' ) ) exit;


for($i = 1; $i <= $columns; $i++) {
      $Columni = 'column'.$i;
      $currentColumn = $row[$Columni];
      
      $columnOptions = $currentColumn['columnOptions'];
      $columnBgColor = $columnOptions['bg_color'];
      $columnMargin = $columnOptions['margin'];
      $columnPadding = $columnOptions['padding'];
      $columnWidth = $columnOptions['width'];
      
      if (isset($columnOptions['columnCSS'])) {
        $columnCSS = $columnOptions['columnCSS'];
      } else{
        $columnCSS = '';
      }

      if (isset($columnOptions['columnCustomClass'])) {
        $columnCustomClass = $columnOptions['columnCustomClass'];
      } else{
        $columnCustomClass = '';
      }

      $colHideOnDesktop = "display:inline-block;"; $colHideOnTablet = "display:inline-block;"; $colHideOnMobile = "display:inline-block;";
      if (isset($columnOptions['colHideOnDesktop']) ) {
        if ($columnOptions['colHideOnDesktop'] == 'hide') {
          $colHideOnDesktop  ="display:none";
        }
        if ($columnOptions['colHideOnTablet'] == 'hide') {
          $colHideOnTablet ="display:none !important;";
        }
        if ($columnOptions['colHideOnMobile'] == 'hide') {
          $colHideOnMobile ="display:none !important;";
        }
      }

      $colContentAlignD = ''; $colContentAlignT = ''; $colContentAlignM = '';
      if (isset( $columnOptions['colCAD'] ) ) {

        if (!isset($columnOptions['colCAT'])) {  $columnOptions['colCAT'] = ''; }
        if (!isset($columnOptions['colCAM'])) {  $columnOptions['colCAM'] = ''; }

        if ($columnOptions['colCAD'] != 'default' && $columnOptions['colCAD'] != '') {
          if ($colHideOnDesktop  != 'display:none') {
            $colContentAlignD = 'display: inline-flex; justify-content: '.$columnOptions['colCAD'].'; flex-direction: column;';
          }
        }

        if ($columnOptions['colCAT'] != 'default' && $columnOptions['colCAT'] != '') { 
          if ($colHideOnTablet != 'display:none') {
            $colContentAlignT = 'display: inline-flex; justify-content: '.$columnOptions['colCAT'].'; flex-direction: column;';
          }
        }

        if ($columnOptions['colCAM'] != 'default' && $columnOptions['colCAM'] != '') {
          if ($colHideOnMobile != 'display:none') {
            $colContentAlignM = 'display: inline-flex; justify-content: '.$columnOptions['colCAM'].'; flex-direction: column;';
          }
        }
        
      }
      

      if (isset($columnOptions['colBoxShadow'])) {
        $colBoxShadow = $columnOptions['colBoxShadow'];
        $this_col_border_shadow = 'box-shadow: '.$colBoxShadow['colBoxShadowH'].'px  '.$colBoxShadow['colBoxShadowV'].'px  '.$colBoxShadow['colBoxShadowBlur'].'px '.$colBoxShadow['colBoxShadowColor'].' ;  ';
      }else{
        $this_col_border_shadow = '';
      }
      
      $thisColBorder = '';
      if (isset($columnOptions['colBorder'])) {
        $colBorder = $columnOptions['colBorder'];
        if (isset($colBorder['colBorderWidth'])) {
          $thisColBorder = 'border: '.$colBorder['colBorderWidth'].'px '.$colBorder['colBorderStyle'].' '.$colBorder['colBorderColor'].' ; border-radius:'.$colBorder['colBorderRadius'].'px;';
        }
      }
      
      $this_col_border_shadow = $this_col_border_shadow.$thisColBorder;

      if (isset($columnOptions['paddingTablet'])) {

        $colWidthTablet = $columnOptions['widthTablet'];
        $colWidthMobile = $columnOptions['widthMobile'];
        
        $colMarginTablet = $columnOptions['marginTablet'];
        $colMarginMobile = $columnOptions['marginMobile'];
        $colPaddingTablet = $columnOptions['paddingTablet'];
        $colPaddingMobile = $columnOptions['paddingMobile'];


        $thisRowResponsiveColStylesTablet = "
        #".$row["rowID"]."-$Columni  {
         width:".$colWidthTablet."% !important;
         margin-top: ".$colMarginTablet['rMTT']."% !important;
         margin-bottom: ".$colMarginTablet['rMBT']."% !important;
         margin-left: ".$colMarginTablet['rMLT']."% !important;
         margin-right: ".$colMarginTablet['rMRT']."% !important;

         padding-top: ".$colPaddingTablet['rPTT']."% !important;
         padding-bottom: ".$colPaddingTablet['rPBT']."% !important;
         padding-left: ".$colPaddingTablet['rPLT']."% !important;
         padding-right: ".$colPaddingTablet['rPRT']."% !important;

         min-height:".$rowHeightTablet."$rowHeightUnitTablet !important;
         $colHideOnTablet
         $colContentAlignT
        }
      
        ";
      

        $thisRowResponsiveColStylesMobile = "
          #".$row["rowID"]."-$Columni  {
           width:".$colWidthMobile."% !important;
           margin-top: ".$colMarginMobile['rMTM']."% !important;
           margin-bottom: ".$colMarginMobile['rMBM']."% !important;
           margin-left: ".$colMarginMobile['rMLM']."% !important;
           margin-right: ".$colMarginMobile['rMRM']."% !important;

           padding-top: ".$colPaddingMobile['rPTM']."% !important;
           padding-bottom: ".$colPaddingMobile['rPBM']."% !important;
           padding-left: ".$colPaddingMobile['rPLM']."% !important;
           padding-right: ".$colPaddingMobile['rPRM']."% !important;

           min-height:".$rowHeightMobile."$rowHeightUnitMobile !important;
           $colHideOnMobile
           $colContentAlignT
          }
        
        ";

        array_push($POPBNallRowStylesResponsiveTablet, $thisRowResponsiveColStylesTablet);
        array_push($POPBNallRowStylesResponsiveMobile, $thisRowResponsiveColStylesMobile);

      }


      $colBackgroundOptions = 'background-color:'.$columnBgColor.';';

        $this_column_bg_img = '';
        if (isset($columnOptions['colBgImg'])) {
          $this_column_bg_img = $columnOptions['colBgImg'];
          if ($this_column_bg_img !== '') {
            $colBackgroundOptions = "background-image:url($this_column_bg_img); background-repeat:no-repeat; background-position:center center; background-size:cover; background-color:$columnBgColor ; "; // old col bg ops

          }
        }

      if (!isset($columnOptions['colBgImg'])) {
        $columnOptions['colBgImg'] = '';
      }

      $currColDefaultBackgroundOps = ''; 
      if ( isset($columnOptions['bgImgOps']) ) {

        $drbgImgOps = $columnOptions['bgImgOps'];

        $defaultRowBgImg = $columnOptions['colBgImg'];
        $tabletRowBgImg = $columnOptions['colBgImgT'];
        $mobileRowBgImg = $columnOptions['colBgImgM'];
        if ($tabletRowBgImg == '') { $tabletRowBgImg = $defaultRowBgImg; }
        if ($mobileRowBgImg == '') { $mobileRowBgImg = $tabletRowBgImg; }

        if (!isset($drbgImgOps['parlx'])) {
          $drbgImgOps['parlx'] = '';
        }

        $defaultRowBgFixed = 'scroll';
        if ($drbgImgOps['parlx'] == 'true') { $defaultRowBgFixed = 'fixed'; }
        $tabletRowBgFixed = $defaultRowBgFixed; $mobileRowBgFixed = $defaultRowBgFixed;
        if ($drbgImgOps['parlxT'] == 'true') { $tabletRowBgFixed = 'fixed'; }
        if ($drbgImgOps['parlxT'] == 'false') { $tabletRowBgFixed = 'scroll'; }
        if ($drbgImgOps['parlxM'] == 'true') { $mobileRowBgFixed = 'fixed'; }
        if ($drbgImgOps['parlxM'] == 'false') { $mobileRowBgFixed = 'scroll'; }

        $drbgImgOpsRep = $drbgImgOps['rep'];
        $drbgImgOpsRepT = $drbgImgOps['repT'];
        $drbgImgOpsRepM = $drbgImgOps['repM'];

        // desktop
        if ($drbgImgOps['pos'] == 'custom') {
          $defaultBgImgPos = 
          "background-position-x: ".$drbgImgOps['xPos'].$drbgImgOps['xPosU']. "; " . 
          "background-position-y: ".$drbgImgOps['yPos'].$drbgImgOps['yPosU']. "; ";
        }else{
          $defaultBgImgPos = "background-position: ".$drbgImgOps['pos']."; ";
        }

        if ( $drbgImgOpsRep == '' || $drbgImgOpsRep == 'default') { $drbgImgOpsRep = 'no-repeat'; }

        if ($drbgImgOps['size'] == 'custom') {
          $defaultBgImgSize = "background-size: ".$drbgImgOps['cWid'].$drbgImgOps['widU']."; ";
        }else{
          $defaultBgImgSize = "background-size: ".$drbgImgOps['size']."; ";
        }
          
        $currColDefaultBackgroundOps = "
            background-color:$rowBgColor ;
            background-image: url($defaultRowBgImg);
            background-repeat: $drbgImgOpsRep;
            background-attachment: $defaultRowBgFixed;
            $defaultBgImgPos
            $defaultBgImgSize
          
        ";

           



        // Tablet
        if ($drbgImgOps['posT'] == 'custom') {
            $tabletBgImgPos = "background-position-x: ".$drbgImgOps['xPosT'].$drbgImgOps['xPosUT']. "; " .
             "background-position-y: ".$drbgImgOps['yPosT'].$drbgImgOps['yPosUT']. "; ";
        } else if($drbgImgOps['posT'] == ''){
          $tabletBgImgPos = $defaultBgImgPos;
        }else{
          $tabletBgImgPos = "background-position: ".$drbgImgOps['posT']."; ";
        }

        if ($drbgImgOpsRepT == '' || $drbgImgOpsRepT == 'default') { $drbgImgOpsRepT = $drbgImgOpsRep; }


        if ($drbgImgOps['sizeT'] == 'custom') {
          $tabletBgImgSize = "background-size: ".$drbgImgOps['cWidT'].$drbgImgOps['widUT']."; ";
        }else if($drbgImgOps['sizeM'] == ''){
          $tabletBgImgSize = $defaultBgImgSize;
        }else{
          $tabletBgImgSize = "background-size: ".$drbgImgOps['sizeT']."; ";
        }
        

        if($tabletRowBgImg !== ''){
          $currColtabletBackgroundOps = "
            #".$row["rowID"]."-$Columni {
              background-image: url($tabletRowBgImg) !important;
              background-repeat: $drbgImgOpsRepT !important;
              background-attachment: $tabletRowBgFixed !important;
              $tabletBgImgPos
              $tabletBgImgSize
            }
          ";
        }
          




        // mobile
        if ($drbgImgOps['posM'] == 'custom') {
          $mobileBgImgPos = 
          "background-position-x: ".$drbgImgOps['xPosM'].$drbgImgOps['xPosUM']. "; " . 
          "background-position-y: ".$drbgImgOps['yPosM'].$drbgImgOps['yPosUM']. "; ";
        }else if($drbgImgOps['posT'] == ''){
          $mobileBgImgPos = $tabletBgImgPos;
        }else{
          $mobileBgImgPos = "background-position: ".$drbgImgOps['posM']."; ";
        }

        if ($drbgImgOpsRepM == '' || $drbgImgOpsRepM == 'default') { $drbgImgOpsRepM = $drbgImgOpsRepT; }

        if ($drbgImgOps['sizeM'] == 'custom') {
          $mobileBgImgSize = "background-size: ".$drbgImgOps['cWidM'].$drbgImgOps['widM']."; ";
        }else if($drbgImgOps['sizeM'] == ''){
          $mobileBgImgSize = $tabletBgImgSize;
        }else{
          $mobileBgImgSize = "background-size: ".$drbgImgOps['sizeM']."; ";
        }

        if($mobileRowBgImg !== ''){
          $currColmobileBackgroundOps = "
            #".$row["rowID"]."-$Columni {
              background-image: url($mobileRowBgImg) !important;
              background-repeat: $drbgImgOpsRepM !important;
              background-attachment: $mobileRowBgFixed !important;
              $mobileBgImgPos
              $mobileBgImgSize
            }
          ";
        }

        



        array_push($POPBNallRowStylesResponsiveTablet, $currColtabletBackgroundOps);
        array_push($POPBNallRowStylesResponsiveMobile, $currColmobileBackgroundOps);
          
      } // latest row bg options ends

      if ($currColDefaultBackgroundOps != '') {  $colBackgroundOptions = $currColDefaultBackgroundOps;  } // set latest row bg options if available
        

        if (isset($columnOptions['colBackgroundType'])) {

          if ($columnOptions['colBackgroundType'] == 'gradient') {
            $colGradient = $columnOptions['colGradient'];

            if ($colGradient['colGradientType'] == 'linear') {
              $colBackgroundOptions = 'background: linear-gradient('.$colGradient['colGradientAngle'].'deg, '.$colGradient['colGradientColorFirst'].' '.$colGradient['colGradientLocationFirst'].'%,'.$colGradient['colGradientColorSecond'].' '.$colGradient['colGradientLocationSecond'].'%);';
            }

            if ($colGradient['colGradientType'] == 'radial') {
              $colBackgroundOptions = 'background: radial-gradient(at '.$colGradient['colGradientPosition'].', '.$colGradient['colGradientColorFirst'].' '.$colGradient['colGradientLocationFirst'].'%,'.$colGradient['colGradientColorSecond'].' '.$colGradient['colGradientLocationSecond'].'%);';
            }
            
          }
        }

        $colID = $row["rowID"]."-$Columni";
        $thisColHoverOption = '';
        if (isset($columnOptions['colHoverOptions'])) {
          $colHoverOptions = $columnOptions['colHoverOptions'];

          if (isset($colHoverOptions['colBackgroundTypeHover'])) {

            if ($colHoverOptions['colBackgroundTypeHover'] == 'solid') {
              $thisColHoverOption = ' #'.$colID.':hover { background:'.$colHoverOptions['colBgColorHover'].' !important; transition: all '.$colHoverOptions['colHoverTransitionDuration'].'s; }';
            }
            if ($colHoverOptions['colBackgroundTypeHover'] == 'gradient') {
              $colGradientHover = $colHoverOptions['colGradientHover'];

              if ($colGradientHover['colGradientTypeHover'] == 'linear') {
                $thisColHoverOption = ' #'.$colID.':hover { background: linear-gradient('.$colGradientHover['colGradientAngleHover'].'deg, '.$colGradientHover['colGradientColorFirstHover'].' '.$colGradientHover['colGradientLocationFirstHover'].'%,'.$colGradientHover['colGradientColorSecondHover'].' '.$colGradientHover['colGradientLocationSecondHover'].'%) !important; transition: all '.$colHoverOptions['colHoverTransitionDuration'].'s; }';
              }

              if ($colGradientHover['colGradientTypeHover'] == 'radial') {

                $thisColHoverOption = ' #'.$colID.':hover { background: radial-gradient(at '.$colGradientHover['colGradientPositionHover'].', '.$colGradientHover['colGradientColorFirstHover'].' '.$colGradientHover['colGradientLocationFirstHover'].'%,'.$colGradientHover['colGradientColorSecondHover'].' '.$colGradientHover['colGradientLocationSecondHover'].'%) !important; transition: all '.$colHoverOptions['colHoverTransitionDuration'].'s; }';
              }
            }
          }

          $thisColHoverStyleTag = ' '.$thisColHoverOption.' ';
          
          array_push($POPBallColumnStylesArray, $thisColHoverStyleTag);
        }




      $columnMarginTop = $columnMargin['columnMarginTop'];
      $columnMarginBottom = $columnMargin['columnMarginBottom'];
      $columnMarginLeft = $columnMargin['columnMarginLeft'];
      $columnMarginRight = $columnMargin['columnMarginRight'];

      $columnPaddingTop = $columnPadding['columnPaddingTop'];
      $columnPaddingBottom = $columnPadding['columnPaddingBottom'];
      $columnPaddingLeft = $columnPadding['columnPaddingLeft'];
      $columnPaddingRight = $columnPadding['columnPaddingRight'];


      $columnMarginStyle = "margin:$columnMarginTop"."% $columnMarginRight"."% $columnMarginBottom"."% $columnMarginLeft"."% ;";

      $columnPaddingStyle = "padding:$columnPaddingTop"."% $columnPaddingRight"."% $columnPaddingBottom"."% $columnPaddingLeft"."% ;";
      
      $columnContent = "";
      //Widgets
      include('widgets.php');
        
        $columnWidthUnit = '%';

        $colWidthIsEmpty = false;
        if ($columnWidth == 0 || $columnWidth === "") {
          switch ($columns) {
            case '1':
              $columnWidthPercent = '99';
              break;
            case '2':
              $columnWidthPercent = '49';
              break;
            case '3':
              $columnWidthPercent = '33.3';
              break;
            case '4':
              $columnWidthPercent = '24';
              break;
            case '5':
              $columnWidthPercent = '19';
              break;
            case '6':
              $columnWidthPercent = '16';
              break;
            case '7':
              $columnWidthPercent = '13.5';
              break;
            case '8':
              $columnWidthPercent = '11.5';
              break;
            case '9':
              $columnWidthPercent = '10.5';
              break;
            case '10':
              $columnWidthPercent = '5';
            break;  
            default:
              $columnWidthPercent = '99';
            break;
          }
          $colWidthIsEmpty = true;
        } else{
            
            if ((int)$columnWidth > 101) {
              $columnWidthPercent = ($columnWidth/1268)*100;
            }else{

              $columnWidthUnit = '%';
              $columnWidthPercent = $columnWidth;
            }
            // $columnWidthPercent = floor( ($columnWidth/1268)*100);
        }


        if ( (int)$columnPaddingLeft > 0 ) {
          $columnWidthPercent = (int)$columnWidthPercent - (int)$columnPaddingLeft; 
        }
        if ( (int)$columnPaddingRight > 0 ) {  
          $columnWidthPercent = (int)$columnWidthPercent - (int)$columnPaddingRight; 
        }

        if ($colWidthIsEmpty == true) {
          if ( (int)$columnMarginLeft > 0 ) {  
            $columnWidthPercent = (int)$columnWidthPercent - (int)$columnMarginLeft; 
          }
          if ( (int)$columnMarginRight > 0 ) {  
            $columnWidthPercent = (int)$columnWidthPercent - (int)$columnMarginRight;  
          }

        }

          //$columnWidthPercent = ($columnWidth/1268)*100;
          $colHeight = '10';
      $columnStyles =  "#".$row["rowID"]."-$Columni {"."width:".$columnWidthPercent.$columnWidthUnit."; min-height:$rowHeight"."px; $colBackgroundOptions background-color:$columnBgColor; $columnMarginStyle  $columnPaddingStyle  $this_col_border_shadow  $columnCSS  $colHideOnDesktop $colContentAlignD min-height:".$rowHeight.$rowHeightUnit."; }";

      array_push($POPBallColumnStylesArray, $columnStyles);

      ?> 
      <div id='<?php echo $row["rowID"]."-$Columni"; ?>' class='pluginops-optinColumn <?php echo "pb-col"."-$columns";  echo "  ".$columnCustomClass;  ?>'> <?php echo $columnContent; ?> </div> <!-- Column ends!-->
      <?php

      
    } // For loop columns ends here ?>