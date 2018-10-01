<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 5.2 | API LIST</title>
        <link  type="image/ico" rel="shortcut icon" href="../images/logo.ico" />
        <style>
            body {
                font-family: Arial, Helvetica, Sans-Serif;
                font-size: 0.9em;
            }
            #apiList th {
                background: #808080 repeat-x scroll center left;
                padding: 7px 15px;
                text-align: left;
                border: 1px solid #000;
                background-color: dimgray;
                color: #fff;
            }
            #apiList td {
                background: none repeat-x scroll center left;
                color: #000;
                padding: 7px 15px;
                font-family: Verdana;
                border: 1px solid #000;
                /*border: 1px solid #808080;*/
            }
            #apiList tr.odd td {
                background: #e8e8ec repeat-x scroll center left;
                cursor: pointer;
                /*border: 1px solid #808080;*/
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#apiList tr:odd").addClass("odd");
                $("#apiList tr:not(.odd)").hide();
                $("#apiList tr:first-child").show();
                $("#apiList tr.odd").click(function () {
                    $(this).next("tr").toggle();
                    $(this).find(".arrow").toggleClass("up");
                });
            });
        </script>
    </head>
    <body>
        <div style="color: white; padding: 10px; text-decoration: none; font-family: Arial; font-size: 30px; padding-left: 5px; background-color: #20b5af">
            <div style="margin: 0px 15.7%;">
               API Help page
            </div>
        </div>
        <br />
        <?php
        $url = "http://192.168.0.108:8080/api/";
        $urlu = "http://192.168.0.108:8080/user/";
        ?>
        <?php $i = 1; ?>
        <div style="width: 100%">
            <table id="apiList" style="width: 69%; margin: 0px 15.5%;">
                <tr style="border-radius: 5px;">
                    <th style="width: 1%;">No</th>
                    <th style="width: 5%;">Method</th>
                    <th style="width: 70%;">Url</th>
                </tr>

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #995D3F;">POST</td>
                    <td><?php echo $url . "user/authenticate"; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <p>Generate User JWT Tokens for Authenticate User</p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "user/authenticate"; ?></p>
                        <h5>Parameters :</h5>
                        <table>
                            <tr>
                                <td>Parameter Name</td>
                                <td>DataType</td>
                                <td>Description</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>email</td>
                                <td>string</td>
                                <td>email id</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>password</td>
                                <td>string</td>
                                <td>password</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </td>
                </tr> 

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #995D3F;">POST</td>
                    <td><?php echo $url . "user/login"; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}</p>
                        <p>Login</p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "user/login"; ?></p>
                        <h5>Parameters :</h5>
                        <table>
                            <tr>
                                <td>Parameter Name</td>
                                <td>DataType</td>
                                <td>Description</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>email</td>
                                <td>string</td>
                                <td>email</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>password</td>
                                <td>string</td>
                                <td>password</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>device_token</td>
                                <td>string</td>
                                <td>device_token</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>device_type</td>
                                <td>string</td>
                                <td>Android/iOS/web</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #995D3F;">POST</td>
                    <td><?php echo $url . "user/register"; ?></td>
                </tr>
                <!--DESCRIPTIN-->
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}</p>
                        <p>Registration</p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "user/register"; ?></p>
                        <h5>Parameters :</h5>
                        <table>
                            <tr>
                                <td>Parameter Name</td>
                                <td>DataType</td>
                                <td>Description</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>first_name</td>
                                <td>string</td>
                                <td>name</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>last_name</td>
                                <td>string</td>
                                <td>surname</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>gender</td>
                                <td>string</td>
                                <td>male/female/other</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>email</td>
                                <td>string</td>
                                <td>email</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>password</td>
                                <td>string</td>
                                <td>password</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>phone_number</td>
                                <td>number</td>
                                <td>phone_number</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>address</td>
                                <td>string</td>
                                <td>address</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>city</td>
                                <td>string</td>
                                <td>city</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>state</td>
                                <td>string</td>
                                <td>state</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>country</td>
                                <td>string</td>
                                <td>state</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>is_social</td>
                                <td>string</td>
                                <td>G+ / facebook</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>social_id</td>
                                <td>string</td>
                                <td>id</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>social_profile</td>
                                <td>string</td>
                                <td>URL String</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>profile_img</td>
                                <td>string</td>
                                <td>image</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>device_token</td>
                                <td>string</td>
                                <td>device_token</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>device_type</td>
                                <td>string</td>
                                <td>Android / iOS</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #995D3F;">POST</td>
                    <td><?php echo $url . "user/update"; ?></td>
                </tr>
                <!--DESCRIPTIN-->
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}</p>
                        <p>Update User Profile Info. / Profile pic.</p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "user/update"; ?></p>
                        <h5>Parameters :</h5>
                        <table>
                            <tr>
                                <td>Parameter Name</td>
                                <td>DataType</td>
                                <td>Description</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>profile_img</td>
                                <td>string</td>
                                <td>Image File(.jpeg / .jpg / .png)</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>first_name</td>
                                <td>string</td>
                                <td>First Name</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>last_name</td>
                                <td>string</td>
                                <td>Last Name</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>gender</td>
                                <td>string</td>
                                <td>male / female / other</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>address</td>
                                <td>string</td>
                                <td>Address</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #995D3F;">POST</td>
                    <td><?php echo $url . "user/change-password"; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}</p>
                        <p>Change password</p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "user/change-password"; ?></p>
                        <h5>Parameters :</h5>
                        <table>
                            <tr>
                                <td>Parameter Name</td>
                                <td>DataType</td>
                                <td>Description</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>old_password</td>
                                <td>string</td>
                                <td>Old Password</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>new_password</td>
                                <td>string</td>
                                <td>New Password</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #995D3F;">POST</td>
                    <td><?php echo $url . "user/forgot_password"; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}</p>
                        <p>Forgot password link to send email</p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "user/forgot_password"; ?></p>
                        <h5>Parameters :</h5>
                        <table>
                            <tr>
                                <td>Parameter Name</td>
                                <td>DataType</td>
                                <td>Description</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>email</td>
                                <td>string</td>
                                <td>email</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #1774CD;">GET</td>
                    <td><?php echo $url . "user-profile"; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}
                        <p>View User Profile<br><br>
                        </p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "user-profile"; ?></p>
                    </td>
                </tr>
                <!--Book-->
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #995D3F;">POST</td>
                    <td><?php echo $url . "book/add"; ?></td>
                </tr>
                <!--DESCRIPTIN-->
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}</p>
                        <p>Add Book Info.</p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "book/add"; ?></p>
                        <h5>Parameters :</h5>
                        <table>
                            <tr>
                                <td>Parameter Name</td>
                                <td>DataType</td>
                                <td>Description</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>name</td>
                                <td>string</td>
                                <td>Book Name</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>author</td>
                                <td>string</td>
                                <td>Author Name</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>price</td>
                                <td>double</td>
                                <td>price per book (decimal)</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>qty</td>
                                <td>string</td>
                                <td>Quantity</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #1774CD;">GET</td>
                    <td><?php echo $url . "book/list"; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}
                        <p>List Avalilable Books<br><br>
                        </p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "book/list"; ?></p>
                    </td>
                </tr>
                <!--My Books-->
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #1774CD;">GET</td>
                    <td><?php echo $url . "book/mylist"; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}
                        <p>List Avalilable Books<br><br>
                        </p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "book/mylist"; ?></p>
                    </td>
                </tr>
                <!--Update Book-->
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #00FF00;">PUT</td>
                    <td><?php echo $url . "book/update/{bookid}"; ?></td>
                </tr>
                <!--DESCRIPTIN-->
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}</p>
                        <p>Update Book Info.</p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "book/update/{book_id}"; ?></p>
                        <h5>Parameters :</h5>
                        <table>
                            <tr>
                                <td>Parameter Name</td>
                                <td>DataType</td>
                                <td>Description</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>name</td>
                                <td>string</td>
                                <td>Book Name</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>author</td>
                                <td>string</td>
                                <td>Author Name</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>price</td>
                                <td>double</td>
                                <td>price per book (decimal)</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>qty</td>
                                <td>string</td>
                                <td>Quantity</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </td>
                </tr>
                <!--Delete Book-->
                <tr>
                    <td><?php echo $i++;?></td>
                    <td style="background-color: #C30; ">DELETE</td>
                    <td><?php echo $url."book/delete/{bookid}"; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <p>Delete Book </p>
                        <h4>header :</h4>
                        Authorization: {token}</p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url."book/delete/{bookid}"; ?></p>
                    </td>
                </tr>
                <!--Rate Book-->
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #995D3F;">POST</td>
                    <td><?php echo $url . "book/rate"; ?></td>
                </tr>
                <!--DESCRIPTIN-->
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}</p>
                        <p>Rate Book.</p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "book/rate"; ?></p>
                        <h5>Parameters :</h5>
                        <table>
                            <tr>
                                <td>Parameter Name</td>
                                <td>DataType</td>
                                <td>Description</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>book_id</td>
                                <td>integer</td>
                                <td>Book Id</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>rate</td>
                                <td>integer</td>
                                <td>Rate for Book</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </td>
                </tr>
                <!--Dashboard-->
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #1774CD;">GET</td>
                    <td><?php echo $url . "user/dashboard"; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}
                        <p>List Avalilable Books<br><br>
                        </p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "user/dashboard"; ?></p>
                    </td>
                </tr>
                
                <!--Rate Book-->
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #995D3F;">POST</td>
                    <td><?php echo $url . "author/add"; ?></td>
                </tr>
                <!--DESCRIPTIN-->
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}</p>
                        <p>Add Author.</p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "author/add"; ?></p>
                        <h5>Parameters :</h5>
                        <table>
                            <tr>
                                <td>Parameter Name</td>
                                <td>DataType</td>
                                <td>Description</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>name</td>
                                <td>string</td>
                                <td>Name of Author</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>city</td>
                                <td>string</td>
                                <td>city of Author</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>about</td>
                                <td>string</td>
                                <td>Author details</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </td>
                </tr>
                
                <!--My Authors-->
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="background-color: #1774CD;">GET</td>
                    <td><?php echo $url . "author/list/isdataTable"; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h5>Description :</h5>
                        <h4>header :</h4>
                        Authorization: {token}
                        <p>List Avalilable Authors<br><br>
                            if isdataTable true => response for Datatable<br>
                            if isdataTable false => response for Select tag<br>
                        </p>
                        <h5>Friendly Url :</h5>
                        <p><?php echo $url . "author/list/isdataTable"; ?></p>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
