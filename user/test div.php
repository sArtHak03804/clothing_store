
<?php 

while ($row = mysqli_fetch_assoc($result)) {

$product_id = $row['product_id'];
$product_query = "SELECT * FROM product WHERE product_id = $product_id";
$product_result = mysqli_query($conn, $product_query);
$product_info = mysqli_fetch_array($product_result);
?>
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
                                ">
	<?php $message .=  $product_info['product_title'];?>
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
                                ">
                                <?php 	$message .= $row['quantity'];?>
                              </p>
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
                                <?php 	$message .= "$"($row['quantity'] * $product_info['product_price']) ;?>
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

                  <?php }?>