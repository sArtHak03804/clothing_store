
<?php 
include("main_files/session.php");

$conn = mysqli_connect("localhost", "root", "", "clothing_db");

$result = mysqli_query($conn, "SELECT * FROM placeorder WHERE user_id = $user_id");

$sub_total = 0;
$message='';
$message.=' <table>
<tbody>
<tr style="background-color: transparent">
<div class="" style="
    min-width: 320px;
    max-width: 680px;
    overflow-wrap: break-word;
    word-wrap: break-word;
    word-break: break-word;
    margin: 0 auto;
    background-color: transparent;
  ">
  <div style="
      border-collapse: collapse;
      display: table;
      width: 100%;
      background-color: transparent;
    ">
    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
    <!--[if (mso)|(IE)]><td align="center" width="226" style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 15px; padding-left: 15px; padding-top:5px; padding-bottom:5px;background-color:#f9feff;"><![endif]-->
    <div class="col num4" style="
        display: table-cell;
        vertical-align: top;
        max-width: 320px;
        min-width: 224px;
        background-color: #f9feff;
        width: 226px;
      ">
      <div class="col_cont" style="width: 100% !important">
        <!--[if (!mso)&(!IE)]><!-->
        <div style="
            border-top: 0px solid transparent;
            border-left: 0px solid transparent;
            border-bottom: 0px solid transparent;
            border-right: 0px solid transparent;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-right: 15px;
            padding-left: 15px;
          ">
          <!--<![endif]-->
          <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
          <div style="
              color: #fb3c2d;
              font-family: Nunito, Arial, Helvetica Neue,
                Helvetica, sans-serif;
              line-height: 1.2;
              padding-top: 10px;
              padding-right: 10px;
              padding-bottom: 10px;
              padding-left: 10px;
            ">
            <div class="txtTinyMce-wrapper" style="
                line-height: 1.2;
                font-size: 12px;
                color: #fb3c2d;
                font-family: Nunito, Arial, Helvetica Neue,
                  Helvetica, sans-serif;
                mso-line-height-alt: 14px;
              ">
              <p style="
                  font-size: 14px;
                  line-height: 1.2;
                  word-break: break-word;
                  mso-line-height-alt: 17px;
                  margin: 0;
                ">
                Item
              </p>
            </div>
          </div>
          <!--[if mso]></td></tr></table><![endif]-->
          <!--[if (!mso)&(!IE)]><!-->
        </div>
        <!--<![endif]-->
      </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    <!--[if (mso)|(IE)]></td><td align="center" width="226" style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 15px; padding-left: 15px; padding-top:5px; padding-bottom:5px;background-color:#f9feff;"><![endif]-->
    <div class="col num4" style="
        display: table-cell;
        vertical-align: top;
        max-width: 320px;
        min-width: 224px;
        background-color: #f9feff;
        width: 226px;
      ">
      <div class="col_cont" style="width: 100% !important">
        <!--[if (!mso)&(!IE)]><!-->
        <div style="
            border-top: 0px solid transparent;
            border-left: 0px solid transparent;
            border-bottom: 0px solid transparent;
            border-right: 0px solid transparent;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-right: 15px;
            padding-left: 15px;
          ">
          <!--<![endif]-->
          <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
          <div style="
              color: #fb3c2d;
              font-family: Nunito, Arial, Helvetica Neue,
                Helvetica, sans-serif;
              line-height: 1.2;
              padding-top: 10px;
              padding-right: 10px;
              padding-bottom: 10px;
              padding-left: 10px;
            ">
            <div class="txtTinyMce-wrapper" style="
                line-height: 1.2;
                font-size: 12px;
                color: #fb3c2d;
                font-family: Nunito, Arial, Helvetica Neue,
                  Helvetica, sans-serif;
                mso-line-height-alt: 14px;
              ">
              <p style="
                  font-size: 14px;
                  line-height: 1.2;
                  word-break: break-word;
                  text-align: center;
                  mso-line-height-alt: 17px;
                  margin: 0;
                ">
                Quantity
              </p>
            </div>
          </div>
          <!--[if mso]></td></tr></table><![endif]-->
          <!--[if (!mso)&(!IE)]><!-->
        </div>
        <!--<![endif]-->
      </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    <!--[if (mso)|(IE)]></td><td align="center" width="226" style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 15px; padding-left: 15px; padding-top:5px; padding-bottom:5px;background-color:#f9feff;"><![endif]-->
    <div class="col num4" style="
        display: table-cell;
        vertical-align: top;
        max-width: 320px;
        min-width: 224px;
        background-color: #f9feff;
        width: 226px;
      ">
      <div class="col_cont" style="width: 100% !important">
        <!--[if (!mso)&(!IE)]><!-->
        <div style="
            border-top: 0px solid transparent;
            border-left: 0px solid transparent;
            border-bottom: 0px solid transparent;
            border-right: 0px solid transparent;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-right: 15px;
            padding-left: 15px;
          ">
          <!--<![endif]-->
          <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
          <div style="
              color: #fb3c2d;
              font-family: Nunito, Arial, Helvetica Neue,
                Helvetica, sans-serif;
              line-height: 1.2;
              padding-top: 10px;
              padding-right: 10px;
              padding-bottom: 10px;
              padding-left: 10px;
            ">
            <div class="txtTinyMce-wrapper" style="
                line-height: 1.2;
                font-size: 12px;
                color: #fb3c2d;
                font-family: Nunito, Arial, Helvetica Neue,
                  Helvetica, sans-serif;
                mso-line-height-alt: 14px;
              ">
              <p style="
                  font-size: 14px;
                  line-height: 1.2;
                  word-break: break-word;
                  text-align: right;
                  mso-line-height-alt: 17px;
                  margin: 0;
                ">
                Total
              </p>
            </div>
          </div>
          <!--[if mso]></td></tr></table><![endif]-->
          <!--[if (!mso)&(!IE)]><!-->
        </div>
        <!--<![endif]-->
      </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
  </div>
</div>
</tr>';
while ($row = mysqli_fetch_assoc($result)) {

  $product_id = $row['product_id'];
  $product_result = mysqli_query($conn,"SELECT * FROM product WHERE product_id = $product_id");
  $product_info = mysqli_fetch_array($product_result);
 
   $message.='<tr style="background-color: transparent">
   <div class="" style="
       min-width: 320px;
       max-width: 680px;
       overflow-wrap: break-word;
       word-wrap: break-word;
       word-break: break-word;
       margin: 0 auto;
       background-color: transparent;
     ">
     <div style="
         border-collapse: collapse;
         display: table;
         width: 100%;
         background-color: transparent;
       ">
       <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
       <!--[if (mso)|(IE)]><td align="center" width="226" style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 5px; padding-left: 5px; padding-top:5px; padding-bottom:5px;"><![endif]-->
       <div class="col num4" style="
           display: table-cell;
           vertical-align: top;
           max-width: 320px;
           min-width: 224px;
           width: 226px;
         ">
         <div class="col_cont" style="width: 100% !important">
           <!--[if (!mso)&(!IE)]><!-->
           <div style="
               border-top: 0px solid transparent;
               border-left: 0px solid transparent;
               border-bottom: 0px solid transparent;
               border-right: 0px solid transparent;
               padding-top: 5px;
               padding-bottom: 5px;
               padding-right: 5px;
               padding-left: 5px;
             ">
             <!--<![endif]-->
             <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
             <div style="
                 color: #393d47;
                 font-family: Nunito, Arial, Helvetica Neue,
                   Helvetica, sans-serif;
                 line-height: 1.2;
                 padding-top: 10px;
                 padding-right: 0px;
                 padding-bottom: 10px;
                 padding-left: 10px;
               ">
               <div class="txtTinyMce-wrapper" style="
                   line-height: 1.2;
                   font-size: 12px;
                   color: #393d47;
                   font-family: Nunito, Arial, Helvetica Neue,
                     Helvetica, sans-serif;
                   mso-line-height-alt: 14px;
                 ">
                 <p style="
                     font-size: 14px;
                     line-height: 1.2;
                     word-break: break-word;
                     mso-line-height-alt: 17px;
                     margin: 0;
                   ">'
                   .$product_info["product_title"].'
                 </p>
               </div>
             </div>
             <!--[if mso]></td></tr></table><![endif]-->
             <!--[if (!mso)&(!IE)]><!-->
           </div>
           <!--<![endif]-->
         </div>
       </div>
       <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
       <!--[if (mso)|(IE)]></td><td align="center" width="226" style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 5px; padding-left: 5px; padding-top:5px; padding-bottom:5px;"><![endif]-->
       <div class="col num4" style="
           display: table-cell;
           vertical-align: top;
           max-width: 320px;
           min-width: 224px;
           width: 226px;
         ">
         <div class="col_cont" style="width: 100% !important">
           <!--[if (!mso)&(!IE)]><!-->
           <div style="
               border-top: 0px solid transparent;
               border-left: 0px solid transparent;
               border-bottom: 0px solid transparent;
               border-right: 0px solid transparent;
               padding-top: 5px;
               padding-bottom: 5px;
               padding-right: 5px;
               padding-left: 5px;
             ">
             <!--<![endif]-->
             <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 5px; padding-left: 5px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
             <div style="
                 color: #393d47;
                 font-family: Nunito, Arial, Helvetica Neue,
                   Helvetica, sans-serif;
                 line-height: 1.2;
                 padding-top: 10px;
                 padding-right: 5px;
                 padding-bottom: 10px;
                 padding-left: 5px;
               ">
               <div class="txtTinyMce-wrapper" style="
                   line-height: 1.2;
                   font-size: 12px;
                   color: #393d47;
                   font-family: Nunito, Arial, Helvetica Neue,
                     Helvetica, sans-serif;
                   mso-line-height-alt: 14px;
                 ">
                 <p style="
                     font-size: 14px;
                     line-height: 1.2;
                     word-break: break-word;
                     text-align: center;
                     mso-line-height-alt: 17px;
                     margin: 0;
                   ">'.$row["quantity"].'</p>
               </div>
             </div>
             
           </div>
          
         </div>
       </div>
       
       <div class="col num4" style="
           display: table-cell;
           vertical-align: top;
           max-width: 320px;
           min-width: 224px;
           width: 226px;
         ">
         <div class="col_cont" style="width: 100% !important">
           <!--[if (!mso)&(!IE)]><!-->
           <div style="
               border-top: 0px solid transparent;
               border-left: 0px solid transparent;
               border-bottom: 0px solid transparent;
               border-right: 0px solid transparent;
               padding-top: 5px;
               padding-bottom: 5px;
               padding-right: 5px;
               padding-left: 5px;
             ">
             <!--<![endif]-->
             <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 0px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
             <div style="
                 color: #393d47;
                 font-family: Nunito, Arial, Helvetica Neue,
                   Helvetica, sans-serif;
                 line-height: 1.2;
                 padding-top: 10px;
                 padding-right: 10px;
                 padding-bottom: 10px;
                 padding-left: 0px;
               ">
               <div class="txtTinyMce-wrapper" style="
                   line-height: 1.2;
                   font-size: 12px;
                   color: #393d47;
                   font-family: Nunito, Arial, Helvetica Neue,
                     Helvetica, sans-serif;
                   mso-line-height-alt: 14px;
                 ">
                 <p style="
                     font-size: 14px;
                     line-height: 1.2;
                     word-break: break-word;
                     text-align: right;
                     mso-line-height-alt: 17px;
                     margin: 0;
                   ">
                   '.$row['quantity'] * $product_info['product_price'];'
                 </p>
               </div>
             </div>
             <!--[if mso]></td></tr></table><![endif]-->
             <!--[if (!mso)&(!IE)]><!-->
           </div>
           <!--<![endif]-->
         </div>
       </div>
       <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
       <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
     </div>
   </div>
</tr>';
  
$sub_total += $row['quantity'] * $product_info['product_price'];
$invoice=$row['created_date'];
$order_no=$row['order_id'];
}
$message.=' </tbody></table>';
?>
<?php 
$email_body='<!DOCTYPE html>
<html>
  <head>
    <title>Thank You for Shopping</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
  </head>
  <body style="background-color:#f2fafc;">
    <div class="container" >
        <div style="background-color: #fb3c2d">
            <div class="block-grid" style="
                min-width: 320px;
                max-width: 680px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                margin: 0 auto;
                background-color: transparent;
              ">
              <div style="
                  border-collapse: collapse;
                  display: table;
                  width: 100%;
                  background-color: transparent;
                ">
                
                <div class="col num12" style="
                    min-width: 320px;
                    max-width: 680px;
                    display: table-cell;
                    vertical-align: top;
                    width: 680px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 0px;
                        padding-left: 0px;
                      ">
                      <!--<![endif]-->
                      <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="
                          table-layout: fixed;
                          vertical-align: top;
                          border-spacing: 0;
                          border-collapse: collapse;
                          mso-table-lspace: 0pt;
                          mso-table-rspace: 0pt;
                          min-width: 100%;
                          -ms-text-size-adjust: 100%;
                          -webkit-text-size-adjust: 100%;
                        " valign="top" width="100%">
                        <tbody>
                          <tr style="vertical-align: top" valign="top">
                            <td class="divider_inner" style="
                                word-break: break-word;
                                vertical-align: top;
                                min-width: 100%;
                                -ms-text-size-adjust: 100%;
                                -webkit-text-size-adjust: 100%;
                                padding-top: 0px;
                                padding-right: 0px;
                                padding-bottom: 0px;
                                padding-left: 0px;
                              " valign="top">
                              <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="01" role="presentation" style="
                                  table-layout: fixed;
                                  vertical-align: top;
                                  border-spacing: 0;
                                  border-collapse: collapse;
                                  mso-table-lspace: 0pt;
                                  mso-table-rspace: 0pt;
                                  border-top: 0px solid transparent;
                                  height: 01px;
                                  width: 100%;
                                " valign="top" width="100%">
                                <tbody>
                                  <tr style="vertical-align: top" valign="top">
                                    <td height="1" style="
                                        word-break: break-word;
                                        vertical-align: top;
                                        -ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%;
                                      " valign="top">
                                      <span></span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color: transparent">
            <div class="block-grid" style="
                min-width: 320px;
                max-width: 680px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                margin: 0 auto;
                background-color: transparent;
              ">
              <div style="
                  border-collapse: collapse;
                  display: table;
                  width: 100%;
                  background-color: transparent;
                ">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="680" style="background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="
                    min-width: 320px;
                    max-width: 680px;
                    display: table-cell;
                    vertical-align: top;
                    width: 680px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 0px;
                        padding-left: 0px;
                      ">
                      <!--<![endif]-->
                      <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="
                          table-layout: fixed;
                          vertical-align: top;
                          border-spacing: 0;
                          border-collapse: collapse;
                          mso-table-lspace: 0pt;
                          mso-table-rspace: 0pt;
                          min-width: 100%;
                          -ms-text-size-adjust: 100%;
                          -webkit-text-size-adjust: 100%;
                        " valign="top" width="100%">
                        <tbody>
                          <tr style="vertical-align: top" valign="top">
                            <td class="divider_inner" style="
                                word-break: break-word;
                                vertical-align: top;
                                min-width: 100%;
                                -ms-text-size-adjust: 100%;
                                -webkit-text-size-adjust: 100%;
                                padding-top: 0px;
                                padding-right: 0px;
                                padding-bottom: 0px;
                                padding-left: 0px;
                              " valign="top">
                              <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="5" role="presentation" style="
                                  table-layout: fixed;
                                  vertical-align: top;
                                  border-spacing: 0;
                                  border-collapse: collapse;
                                  mso-table-lspace: 0pt;
                                  mso-table-rspace: 0pt;
                                  border-top: 0px solid transparent;
                                  height: 5px;
                                  width: 100%;
                                " valign="top" width="100%">
                                <tbody>
                                  <tr style="vertical-align: top" valign="top">
                                    <td height="5" style="
                                        word-break: break-word;
                                        vertical-align: top;
                                        -ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%;
                                      " valign="top">
                                      <span></span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      
                    </div>
                   
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div style="background-color: transparent">
            <div class="block-grid" style="
                min-width: 320px;
                max-width: 680px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                margin: 0 auto;
                background-color: transparent;
              ">
              <div style="
                  border-collapse: collapse;
                  display: table;
                  width: 100%;
                  background-color: transparent;
                "> 
                <div class="col num12" style="
                    min-width: 320px;
                    max-width: 680px;
                    display: table-cell;
                    vertical-align: top;
                    width: 680px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 0px;
                        padding-left: 0px;
                      ">
                      
                      
                     
                      <div style="
                          color: #44464a;
                          font-family: Playfair Display, Georgia, serif;
                          line-height: 1.2;
                          padding-top: 10px;
                          padding-right: 10px;
                          padding-bottom: 10px;
                          padding-left: 10px;
                        ">
                        <div class="txtTinyMce-wrapper" style="
                            line-height: 1.2;
                            font-size: 12px;
                            font-family: Playfair Display, Georgia, serif;
                            color: #44464a;
                            mso-line-height-alt: 14px;
                          ">
                          <p style="
                              font-size: 30px;
                              line-height: 1.2;
                              word-break: break-word;
                              text-align: center;
                              font-family: Playfair Display, Georgia, serif;
                              mso-line-height-alt: 36px;
                              margin: 0;
                            ">
                            <span style="font-size: 30px">Thank you for shopping with us!</span>
                          </p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                      
                      <!--[if mso]></td></tr></table><![endif]-->
                    
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>      
      
      <div class="order-details">
        <div style="background-color: transparent">
            <div class="block-grid mixed-two-up" style="
                min-width: 320px;
                max-width: 680px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                margin: 0 auto;
                background-color: #ffffff;
              ">
              <div style="
                  border-collapse: collapse;
                  display: table;
                  width: 100%;
                  background-color: #ffffff;
                ">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="453" style="background-color:#ffffff;width:453px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top:15px; padding-bottom:5px;"><![endif]-->
                <div class="col num8" style="
                    display: table-cell;
                    vertical-align: top;
                    max-width: 320px;
                    min-width: 448px;
                    width: 453px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 15px;
                        padding-bottom: 5px;
                        padding-right: 10px;
                        padding-left: 10px;
                      ">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                      <div style="
                          color: #44464a;
                          font-family: Nunito, Arial, Helvetica Neue,
                            Helvetica, sans-serif;
                          line-height: 1.2;
                          padding-top: 10px;
                          padding-right: 10px;
                          padding-bottom: 10px;
                          padding-left: 10px;
                        ">
                        <div class="txtTinyMce-wrapper" style="
                            line-height: 1.2;
                            font-size: 12px;
                            color: #44464a;
                            font-family: Nunito, Arial, Helvetica Neue,
                              Helvetica, sans-serif;
                            mso-line-height-alt: 14px;
                          ">
                          <p style="
                              font-size: 14px;
                              line-height: 1.2;
                              word-break: break-word;
                              mso-line-height-alt: 17px;
                              margin: 0;
                            ">
                            Order number:'.$order_no.'
                            <span style="color: #fb3c2d"><strong><?php echo $order_no?></strong></span>
                          </p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                      <div style="
                          color: #44464a;
                          font-family: Nunito, Arial, Helvetica Neue,
                            Helvetica, sans-serif;
                          line-height: 1.2;
                          padding-top: 10px;
                          padding-right: 10px;
                          padding-bottom: 10px;
                          padding-left: 10px;
                        ">
                        <div class="txtTinyMce-wrapper" style="
                            line-height: 1.2;
                            font-size: 12px;
                            color: #44464a;
                            font-family: Nunito, Arial, Helvetica Neue,
                              Helvetica, sans-serif;
                            mso-line-height-alt: 14px;
                          ">
                          <p style="
                              font-size: 14px;
                              line-height: 1.2;
                              word-break: break-word;
                              mso-line-height-alt: 17px;
                              margin: 0;
                            ">
                            Invoice Date:&nbsp'.$invoice.'
                          </p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="226" style="background-color:#ffffff;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:15px;"><![endif]-->
                <div class="col num4" style="
                    display: table-cell;
                    vertical-align: top;
                    max-width: 320px;
                    min-width: 224px;
                    width: 226px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 15px;
                        padding-right: 0px;
                        padding-left: 0px;
                      ">
                      <!--<![endif]-->
                      <div class="mobile_hide">
                        <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="
                            table-layout: fixed;
                            vertical-align: top;
                            border-spacing: 0;
                            border-collapse: collapse;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            min-width: 100%;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                          " valign="top" width="100%">
                          <tbody>
                            <tr style="vertical-align: top" valign="top">
                              <td class="divider_inner" style="
                                  word-break: break-word;
                                  vertical-align: top;
                                  min-width: 100%;
                                  -ms-text-size-adjust: 100%;
                                  -webkit-text-size-adjust: 100%;
                                  padding-top: 0px;
                                  padding-right: 0px;
                                  padding-bottom: 0px;
                                  padding-left: 0px;
                                " valign="top">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="15" role="presentation" style="
                                    table-layout: fixed;
                                    vertical-align: top;
                                    border-spacing: 0;
                                    border-collapse: collapse;
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                    border-top: 0px solid transparent;
                                    height: 15px;
                                    width: 100%;
                                  " valign="top" width="100%">
                                  <tbody>
                                    <tr style="vertical-align: top" valign="top">
                                      <td height="15" style="
                                          word-break: break-word;
                                          vertical-align: top;
                                          -ms-text-size-adjust: 100%;
                                          -webkit-text-size-adjust: 100%;
                                        " valign="top">
                                        <span></span>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color: transparent">
            <div class="block-grid" style="
                min-width: 320px;
                max-width: 680px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                margin: 0 auto;
                background-color: transparent;
              ">
              <div style="
                  border-collapse: collapse;
                  display: table;
                  width: 100%;
                  background-color: transparent;
                ">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="680" style="background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="
                    min-width: 320px;
                    max-width: 680px;
                    display: table-cell;
                    vertical-align: top;
                    width: 680px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 0px;
                        padding-left: 0px;
                      ">
                      <!--<![endif]-->
                      <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="
                          table-layout: fixed;
                          vertical-align: top;
                          border-spacing: 0;
                          border-collapse: collapse;
                          mso-table-lspace: 0pt;
                          mso-table-rspace: 0pt;
                          min-width: 100%;
                          -ms-text-size-adjust: 100%;
                          -webkit-text-size-adjust: 100%;
                        " valign="top" width="100%">
                        <tbody>
                          <tr style="vertical-align: top" valign="top">
                            <td class="divider_inner" style="
                                word-break: break-word;
                                vertical-align: top;
                                min-width: 100%;
                                -ms-text-size-adjust: 100%;
                                -webkit-text-size-adjust: 100%;
                                padding-top: 0px;
                                padding-right: 0px;
                                padding-bottom: 0px;
                                padding-left: 0px;
                              " valign="top">
                              <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="15" role="presentation" style="
                                  table-layout: fixed;
                                  vertical-align: top;
                                  border-spacing: 0;
                                  border-collapse: collapse;
                                  mso-table-lspace: 0pt;
                                  mso-table-rspace: 0pt;
                                  border-top: 0px solid transparent;
                                  height: 15px;
                                  width: 100%;
                                " valign="top" width="100%">
                                <tbody>
                                  <tr style="vertical-align: top" valign="top">
                                    <td height="15" style="
                                        word-break: break-word;
                                        vertical-align: top;
                                        -ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%;
                                      " valign="top">
                                      <span></span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
       
            '.$message.'       
       
        <div style="background-color: transparent">
            <div class="block-grid" style="
                min-width: 320px;
                max-width: 680px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                margin: 0 auto;
                background-color: transparent;
              ">
              <div style="
                  border-collapse: collapse;
                  display: table;
                  width: 100%;
                  background-color: transparent;
                ">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="680" style="background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="
                    min-width: 320px;
                    max-width: 680px;
                    display: table-cell;
                    vertical-align: top;
                    width: 680px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 0px;
                        padding-left: 0px;
                      ">
                      <!--<![endif]-->
                      <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="
                          table-layout: fixed;
                          vertical-align: top;
                          border-spacing: 0;
                          border-collapse: collapse;
                          mso-table-lspace: 0pt;
                          mso-table-rspace: 0pt;
                          min-width: 100%;
                          -ms-text-size-adjust: 100%;
                          -webkit-text-size-adjust: 100%;
                        " valign="top" width="100%">
                        <tbody>
                          <tr style="vertical-align: top" valign="top">
                            <td class="divider_inner" style="
                                word-break: break-word;
                                vertical-align: top;
                                min-width: 100%;
                                -ms-text-size-adjust: 100%;
                                -webkit-text-size-adjust: 100%;
                                padding-top: 0px;
                                padding-right: 0px;
                                padding-bottom: 0px;
                                padding-left: 0px;
                              " valign="top">
                              <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="1" role="presentation" style="
                                  table-layout: fixed;
                                  vertical-align: top;
                                  border-spacing: 0;
                                  border-collapse: collapse;
                                  mso-table-lspace: 0pt;
                                  mso-table-rspace: 0pt;
                                  border-top: 1px solid #e1ecef;
                                  height: 1px;
                                  width: 100%;
                                " valign="top" width="100%">
                                <tbody>
                                  <tr style="vertical-align: top" valign="top">
                                    <td height="1" style="
                                        word-break: break-word;
                                        vertical-align: top;
                                        -ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%;
                                      " valign="top">
                                      <span></span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color: transparent">
            <div class="block-grid three-up no-stack" style="
                min-width: 320px;
                max-width: 680px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                margin: 0 auto;
                background-color: transparent;
              ">
              <div style="
                  border-collapse: collapse;
                  display: table;
                  width: 100%;
                  background-color: transparent;
                ">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="226" style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 5px; padding-left: 5px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="
                    display: table-cell;
                    vertical-align: top;
                    max-width: 320px;
                    min-width: 224px;
                    width: 226px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 5px;
                        padding-left: 5px;
                      ">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                      <div style="
                          color: #393d47;
                          font-family: Nunito, Arial, Helvetica Neue,
                            Helvetica, sans-serif;
                          line-height: 1.2;
                          padding-top: 10px;
                          padding-right: 10px;
                          padding-bottom: 10px;
                          padding-left: 10px;
                        ">
                        <div class="txtTinyMce-wrapper" style="
                            line-height: 1.2;
                            font-size: 12px;
                            color: #393d47;
                            font-family: Nunito, Arial, Helvetica Neue,
                              Helvetica, sans-serif;
                            mso-line-height-alt: 14px;
                          ">
                          <p style="
                              font-size: 16px;
                              line-height: 1.2;
                              word-break: break-word;
                              mso-line-height-alt: 19px;
                              margin: 0;
                            ">
                            <span style="font-size: 16px"><strong>Subtotal</strong></span>
                          </p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="226" style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="
                    display: table-cell;
                    vertical-align: top;
                    max-width: 320px;
                    min-width: 224px;
                    width: 226px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 0px;
                        padding-left: 0px;
                      ">
                      <!--<![endif]-->
                      <div></div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="226" style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 5px; padding-left: 5px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="
                    display: table-cell;
                    vertical-align: top;
                    max-width: 320px;
                    min-width: 224px;
                    width: 226px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 5px;
                        padding-left: 5px;
                      ">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                      <div style="
                          color: #393d47;
                          font-family: Nunito, Arial, Helvetica Neue,
                            Helvetica, sans-serif;
                          line-height: 1.2;
                          padding-top: 10px;
                          padding-right: 10px;
                          padding-bottom: 10px;
                          padding-left: 10px;
                        ">
                        <div class="txtTinyMce-wrapper" style="
                            line-height: 1.2;
                            font-size: 12px;
                            color: #393d47;
                            font-family: Nunito, Arial, Helvetica Neue,
                              Helvetica, sans-serif;
                            mso-line-height-alt: 14px;
                          ">
                          <p style="
                              font-size: 16px;
                              line-height: 1.2;
                              word-break: break-word;
                              text-align: right;
                              mso-line-height-alt: 19px;
                              margin: 0;
                            ">
                            <span style="font-size: 16px">'.$sub_total.'</span>
                          </p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color: transparent">
            <div class="block-grid" style="
                min-width: 320px;
                max-width: 680px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                margin: 0 auto;
                background-color: transparent;
              ">
              <div style="
                  border-collapse: collapse;
                  display: table;
                  width: 100%;
                  background-color: transparent;
                ">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="680" style="background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="
                    min-width: 320px;
                    max-width: 680px;
                    display: table-cell;
                    vertical-align: top;
                    width: 680px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 0px;
                        padding-left: 0px;
                      ">
                      <!--<![endif]-->
                      <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="
                          table-layout: fixed;
                          vertical-align: top;
                          border-spacing: 0;
                          border-collapse: collapse;
                          mso-table-lspace: 0pt;
                          mso-table-rspace: 0pt;
                          min-width: 100%;
                          -ms-text-size-adjust: 100%;
                          -webkit-text-size-adjust: 100%;
                        " valign="top" width="100%">
                        <tbody>
                          <tr style="vertical-align: top" valign="top">
                            <td class="divider_inner" style="
                                word-break: break-word;
                                vertical-align: top;
                                min-width: 100%;
                                -ms-text-size-adjust: 100%;
                                -webkit-text-size-adjust: 100%;
                                padding-top: 0px;
                                padding-right: 0px;
                                padding-bottom: 0px;
                                padding-left: 0px;
                              " valign="top">
                              <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="1" role="presentation" style="
                                  table-layout: fixed;
                                  vertical-align: top;
                                  border-spacing: 0;
                                  border-collapse: collapse;
                                  mso-table-lspace: 0pt;
                                  mso-table-rspace: 0pt;
                                  border-top: 1px solid #e1ecef;
                                  height: 1px;
                                  width: 100%;
                                " valign="top" width="100%">
                                <tbody>
                                  <tr style="vertical-align: top" valign="top">
                                    <td height="1" style="
                                        word-break: break-word;
                                        vertical-align: top;
                                        -ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%;
                                      " valign="top">
                                      <span></span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color: transparent">
            <div class="block-grid three-up no-stack" style="
                min-width: 320px;
                max-width: 680px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                margin: 0 auto;
                background-color: transparent;
              ">
              <div style="
                  border-collapse: collapse;
                  display: table;
                  width: 100%;
                  background-color: transparent;
                ">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="226" style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 5px; padding-left: 5px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="
                    display: table-cell;
                    vertical-align: top;
                    max-width: 320px;
                    min-width: 224px;
                    width: 226px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 5px;
                        padding-left: 5px;
                      ">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                      <div style="
                          color: #393d47;
                          font-family: Nunito, Arial, Helvetica Neue,
                            Helvetica, sans-serif;
                          line-height: 1.2;
                          padding-top: 10px;
                          padding-right: 10px;
                          padding-bottom: 10px;
                          padding-left: 10px;
                        ">
                        <div class="txtTinyMce-wrapper" style="
                            line-height: 1.2;
                            font-size: 12px;
                            color: #393d47;
                            font-family: Nunito, Arial, Helvetica Neue,
                              Helvetica, sans-serif;
                            mso-line-height-alt: 14px;
                          ">
                          <p style="
                              font-size: 16px;
                              line-height: 1.2;
                              word-break: break-word;
                              mso-line-height-alt: 19px;
                              margin: 0;
                            ">
                            <span style="font-size: 16px"><strong>Discount</strong></span>
                          </p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="226" style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="
                    display: table-cell;
                    vertical-align: top;
                    max-width: 320px;
                    min-width: 224px;
                    width: 226px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 0px;
                        padding-left: 0px;
                      ">
                      <!--<![endif]-->
                      <div></div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="226" style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 5px; padding-left: 5px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="
                    display: table-cell;
                    vertical-align: top;
                    max-width: 320px;
                    min-width: 224px;
                    width: 226px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 5px;
                        padding-left: 5px;
                      ">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                      <div style="
                          color: #393d47;
                          font-family: Nunito, Arial, Helvetica Neue,
                            Helvetica, sans-serif;
                          line-height: 1.2;
                          padding-top: 10px;
                          padding-right: 10px;
                          padding-bottom: 10px;
                          padding-left: 10px;
                        ">
                        <div class="txtTinyMce-wrapper" style="
                            line-height: 1.2;
                            font-size: 12px;
                            color: #393d47;
                            font-family: Nunito, Arial, Helvetica Neue,
                              Helvetica, sans-serif;
                            mso-line-height-alt: 14px;
                          ">
                          <p style="
                              font-size: 16px;
                              line-height: 1.2;
                              word-break: break-word;
                              text-align: right;
                              mso-line-height-alt: 19px;
                              margin: 0;
                            ">
                            <span style="font-size: 16px">$ 0.00</span>
                          </p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>  
          <div style="background-color: transparent">
            <div class="block-grid" style="
                min-width: 320px;
                max-width: 680px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                margin: 0 auto;
                background-color: transparent;
              ">
              <div style="
                  border-collapse: collapse;
                  display: table;
                  width: 100%;
                  background-color: transparent;
                ">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="680" style="background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="
                    min-width: 320px;
                    max-width: 680px;
                    display: table-cell;
                    vertical-align: top;
                    width: 680px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 0px;
                        padding-left: 0px;
                      ">
                      <!--<![endif]-->
                      <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="
                          table-layout: fixed;
                          vertical-align: top;
                          border-spacing: 0;
                          border-collapse: collapse;
                          mso-table-lspace: 0pt;
                          mso-table-rspace: 0pt;
                          min-width: 100%;
                          -ms-text-size-adjust: 100%;
                          -webkit-text-size-adjust: 100%;
                        " valign="top" width="100%">
                        <tbody>
                          <tr style="vertical-align: top" valign="top">
                            <td class="divider_inner" style="
                                word-break: break-word;
                                vertical-align: top;
                                min-width: 100%;
                                -ms-text-size-adjust: 100%;
                                -webkit-text-size-adjust: 100%;
                                padding-top: 0px;
                                padding-right: 0px;
                                padding-bottom: 0px;
                                padding-left: 0px;
                              " valign="top">
                              <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="1" role="presentation" style="
                                  table-layout: fixed;
                                  vertical-align: top;
                                  border-spacing: 0;
                                  border-collapse: collapse;
                                  mso-table-lspace: 0pt;
                                  mso-table-rspace: 0pt;
                                  border-top: 1px solid #e1ecef;
                                  height: 1px;
                                  width: 100%;
                                " valign="top" width="100%">
                                <tbody>
                                  <tr style="vertical-align: top" valign="top">
                                    <td height="1" style="
                                        word-break: break-word;
                                        vertical-align: top;
                                        -ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%;
                                      " valign="top">
                                      <span></span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>    
          <div style="background-color: transparent">
            <div class="block-grid" style="
                min-width: 320px;
                max-width: 680px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                margin: 0 auto;
                background-color: transparent;
              ">
              <div style="
                  border-collapse: collapse;
                  display: table;
                  width: 100%;
                  background-color: transparent;
                ">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="680" style="background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 5px; padding-left: 5px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="
                    min-width: 320px;
                    max-width: 680px;
                    display: table-cell;
                    vertical-align: top;
                    width: 680px;
                  ">
                  <div class="col_cont" style="width: 100% !important">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="
                        border-top: 0px solid transparent;
                        border-left: 0px solid transparent;
                        border-bottom: 0px solid transparent;
                        border-right: 0px solid transparent;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        padding-right: 5px;
                        padding-left: 5px;
                      ">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                      <div style="
                          color: #fb3c2d;
                          font-family: Nunito, Arial, Helvetica Neue,
                            Helvetica, sans-serif;
                          line-height: 1.2;
                          padding-top: 10px;
                          padding-right: 10px;
                          padding-bottom: 10px;
                          padding-left: 10px;
                        ">
                        <div class="txtTinyMce-wrapper" style="
                            line-height: 1.2;
                            font-size: 12px;
                            color: #fb3c2d;
                            font-family: Nunito, Arial, Helvetica Neue,
                              Helvetica, sans-serif;
                            mso-line-height-alt: 14px;
                          ">
                          <p style="
                              font-size: 22px;
                              line-height: 1.2;
                              word-break: break-word;
                              text-align: right;
                              mso-line-height-alt: 26px;
                              margin: 0;
                            ">
                            <span style="font-size: 22px"><strong><span style="">Total '.$sub_total.'</span></strong></span>
                          </p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>      
        </div>
    
        <div style="background-color: transparent">
        <div class="block-grid" style="
            min-width: 320px;
            max-width: 680px;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
            margin: 0 auto;
            background-color: #ffffff;
          ">
          <div style="
              border-collapse: collapse;
              display: table;
              width: 100%;
              background-color: #ffffff;
            ">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:680px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="680" style="background-color:#ffffff;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:15px; padding-bottom:15px;"><![endif]-->
            <div class="col num12" style="
                min-width: 320px;
                max-width: 680px;
                display: table-cell;
                vertical-align: top;
                width: 680px;
              ">
              <div class="col_cont" style="width: 100% !important">
                <!--[if (!mso)&(!IE)]><!-->
                <div style="
                    border-top: 0px solid transparent;
                    border-left: 0px solid transparent;
                    border-bottom: 0px solid transparent;
                    border-right: 0px solid transparent;
                    padding-top: 15px;
                    padding-bottom: 15px;
                    padding-right: 0px;
                    padding-left: 0px;
                  ">
                  <!--<![endif]-->
                  <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 35px; padding-left: 35px; padding-top: 15px; padding-bottom: 15px; font-family: Arial, sans-serif"><![endif]-->
                  <div style="
                      color: #44464a;
                      font-family: Nunito, Arial, Helvetica Neue,
                        Helvetica, sans-serif;
                      line-height: 1.5;
                      padding-top: 15px;
                      padding-right: 35px;
                      padding-bottom: 15px;
                      padding-left: 35px;
                    ">
                    <div class="txtTinyMce-wrapper" style="
                        line-height: 1.5;
                        font-size: 12px;
                        color: #44464a;
                        font-family: Nunito, Arial, Helvetica Neue,
                          Helvetica, sans-serif;
                        mso-line-height-alt: 18px;
                      ">
                      <p style="
                          font-size: 14px;
                          line-height: 1.5;
                          word-break: break-word;
                          text-align: center;
                          mso-line-height-alt: 21px;
                          margin: 0;
                        ">
                        You can find more amazing products on our website.
                      </p>
                    </div>
                  </div>
                  <!--[if mso]></td></tr></table><![endif]-->
                  <div align="center" class="button-container" style="
                      padding-top: 10px;
                      padding-right: 10px;
                      padding-bottom: 10px;
                      padding-left: 10px;
                    ">
                   <a href="/shop" style="
                        -webkit-text-size-adjust: none;
                        text-decoration: none;
                        display: inline-block;
                        color: #fb3c2d;
                        background-color: transparent;
                        border-radius: 28px;
                        -webkit-border-radius: 28px;
                        -moz-border-radius: 28px;
                        width: auto;
                        width: auto;
                        border-top: 1px solid #fb3c2d;
                        border-right: 1px solid #fb3c2d;
                        border-bottom: 1px solid #fb3c2d;
                        border-left: 1px solid #fb3c2d;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        font-family: Nunito, Arial, Helvetica Neue,
                          Helvetica, sans-serif;
                        text-align: center;
                        mso-border-alt: none;
                        word-break: keep-all;
                      " target="_blank"><span style="
                          padding-left: 20px;
                          padding-right: 20px;
                          font-size: 16px;
                          display: inline-block;
                          letter-spacing: undefined;
                        "><span style="
                            font-size: 16px;
                            line-height: 2;
                            word-break: break-word;
                            mso-line-height-alt: 32px;
                          ">View More</span></span></a>
                    <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                  </div>
                  <!--[if (!mso)&(!IE)]><!-->
                </div>
                <!--<![endif]-->
              </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
          </div>
        </div>
      </div>  
    </div>
</body>
</html>';

$to ="patelsarthak666@gmail.com"; 
$subject = "Your Order Confirmation - [Order Number]";
$headers = "From: patelsarthak666@gmail.com\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8";
if(mail($to, $subject, $email_body, $headers)){
  echo "success";
}

else {
  echo "mail not sent";
}
?>