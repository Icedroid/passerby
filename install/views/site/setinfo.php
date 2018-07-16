<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-10-19 12:51
 */

use common\widgets\JsBlock;
use yii\helpers\Url;
use install\assets\LayerAsset;

LayerAsset::register($this);
$this->title = yii::t('install', 'Create Data');
?>
    <section class="section">
        <?= $this->render('_steps') ?>
        <form id="js-install-form" action="<?php Url::to(['setinfo']) ?>" method="post">
            <input type="hidden" name="force" value="0"/>
            <div class="server">
                <table width="100%">
                    <tr>
                        <td class="td1" width="100"><?= yii::t('install', 'Database') ?></td>
                        <td class="td1" width="200">&nbsp;</td>
                        <td class="td1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'Type') ?>：</td>
                        <td>
                            <select name="dbtype">
                                <option selected value="mysql">MySQL</option>
                                <option value="sqlite">SQLite</option>
                                <option value="postgresql">PostgreSQL</option>
                            </select>
                        </td>
                        <td>
                            <div>
                                <span class="gray"><?= yii::t('install', 'Recommend MySQL') ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'DB Host') ?>：</td>
                        <td><input type="text" name="dbhost" id="dbhost" value="localhost" class="input"></td>
                        <td>
                            <div id="js-install-tip-dbhost">
                                <span class="gray"><?= yii::t('install', 'Database host, localhost is the common') ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'DB Port') ?>：</td>
                        <td><input type="text" name="dbport" id="dbport" value="3306" class="input"></td>
                        <td>
                            <div id="js-install-tip-dbport">
                                <span class="gray"><?= yii::t('install', 'Default mysql 3306, PostgreSQL 5432') ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'DB Username') ?>：</td>
                        <td><input type="text" name="dbuser" id="dbuser" value="root" class="input"></td>
                        <td>
                            <div id="js-install-tip-dbuser"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'DB Password') ?>：</td>
                        <td><input type="password" name="dbpw" id="dbpw" value="" class="input" autoComplete="off"></td>
                        <td>
                            <div id="js-install-tip-dbpw"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'DB Name') ?>：</td>
                        <td><input type="text" name="dbname" id="dbname" value="feehi" class="input"></td>
                        <td>
                            <div id="js-install-tip-dbname"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'Table Prefix') ?>：</td>
                        <td><input type="text" name="dbprefix" id="dbprefix" value="feehi_" class="input"></td>
                        <td>
                            <div id="js-install-tip-dbprefix"></div>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td class="td1" width="100"><?= yii::t('install', 'Website') ?></td>
                        <td class="td1" width="200">&nbsp;</td>
                        <td class="td1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'Title') ?>：</td>
                        <td><input type="text" name="sitename" value="Land" class="input"></td>
                        <td>
                            <div id="js-install-tip-sitename"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'Site Url') ?>：</td>
                        <td><input type="text" name="siteurl" value="<?= yii::$app->getRequest()->hostInfo ?>/"
                                   class="input" autoComplete="off"></td>
                        <td>
                            <div id="js-install-tip-siteurl">
                                <span class="gray"><?= yii::t('install', 'Please end at "/"') ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'Keywords') ?>：</td>
                        <td><input type="text" name="sitekeywords" value="Land, feehi,framework"
                                   class="input" autoComplete="off"></td>
                        <td>
                            <div id="js-install-tip-sitekeywords"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'Description') ?>：</td>
                        <td><input type="text" name="siteinfo" class="input" value="Land是一款基于yii2的高性能快速开发的内容管理框架">
                        </td>
                        <td>
                            <div id="js-install-tip-siteinfo"></div>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td class="td1" width="100"><?= yii::t('install', 'Administrator') ?></td>
                        <td class="td1" width="200">&nbsp;</td>
                        <td class="td1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'Username') ?>：</td>
                        <td><input type="text" name="manager" value="admin" class="input"></td>
                        <td>
                            <div id="js-install-tip-manager"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'Password') ?>：</td>
                        <td><input type="password" name="manager_pwd" id="js-manager-pwd" class="input"
                                   autoComplete="off"></td>
                        <td>
                            <div id="js-install-tip-manager_pwd"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'Re-password') ?>：</td>
                        <td><input type="password" name="manager_ckpwd" class="input" autoComplete="off"></td>
                        <td>
                            <div id="js-install-tip-manager_ckpwd"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= yii::t('install', 'Email') ?>：</td>
                        <td><input type="text" name="manager_email" class="input" value=""></td>
                        <td>
                            <div id="js-install-tip-manager_email"></div>
                        </td>
                    </tr>
                </table>
                <div id="js-response-tips" style="display: none;"></div>
            </div>
            <div class="bottom text-center">
                <a href="<?= Url::to(['check-environment']) ?>"
                   class="btn btn-primary"><?= yii::t('install', 'Prev') ?></a>
                <button type="submit" class="btn btn-primary"><?= yii::t('install', 'Install') ?></button>
            </div>
        </form>
    </section>
<?php JsBlock::begin() ?>
    <script>
        $(function () {
            //聚焦时默认提示
            var focus_tips = {
                dbhost: '<?=yii::t('install', 'Database host, localhost is the common')?>',
                dbport: '<?=yii::t('install', 'Default mysql 3306, PostgreSQL 5432')?>',
                dbuser: '<?=yii::t('install', 'Database Username')?>',
                dbpw: '<?=yii::t('install', 'Database Password')?>',
                dbname: '<?=yii::t('install', 'Database Name')?>',
                dbprefix: '<?=yii::t('install', 'Only in one database install various cms should update')?>',
                manager: '<?=yii::t('install', 'Super administrator, own the whole permission')?>',
                manager_pwd: '',
                manager_ckpwd: '',
                sitename: '',
                siteurl: '<?=yii::t('install', 'Please end at "/"')?>',
                sitekeywords: '',
                siteinfo: '',
                manager_email: ''
            };

            var install_form = $("#js-install-form");

            //validate插件修改了remote ajax验证返回的response处理方式；增加密码强度提示 passwordRank
            install_form.validate({
                //debug : true,
                //onsubmit : false,
                errorPlacement: function (error, element) {
                    //错误提示容器
                    $('#js-install-tip-' + element[0].name).html(error);
                },
                errorElement: 'span',
                //invalidHandler : , 未验证通过 回调
                //ignore : '.ignore' 忽略验证
                //onkeyup : true,
                errorClass: 'tips-error',
                validClass: 'tips-error',
                onkeyup: false,
                focusInvalid: false,
                rules: {
                    dbhost: {required: true},
                    dbport: {required: true},
                    dbuser: {required: true},
                    /* dbpw: {required	: true}, */
                    dbname: {required: true},
                    //dbprefix: {required: true},
                    manager: {required: true},
                    manager_pwd: {required: true},
                    manager_ckpwd: {required: true, equalTo: '#js-manager-pwd'},
                    manager_email: {required: true, email: true}
                },
                highlight: false,
                unhighlight: function (element, errorClass, validClass) {
                    var tip_elem = $('#js-install-tip-' + element.name);
                    tip_elem.html('<span class="' + validClass + '" data-text="text"><span>');
                },
                onfocusin: function (element) {
                    var name = element.name;
                    $('#js-install-tip-' + name).html('<span data-text="text">' + focus_tips[name] + '</span>');
                    $(element).parents('tr').addClass('current');
                },
                onfocusout: function (element) {
                    var _this = this;
                    $(element).parents('tr').removeClass('current');

                    if (element.name === 'email') {
                        //邮箱匹配点击后，延时处理
                        setTimeout(function () {
                            _this.element(element);
                        }, 150);
                    } else {
                        _this.element(element);
                    }

                },
                messages: {
                    dbhost: {required: '<?=yii::t('install', '{attribute} cannot be empty', ['attribute' => yii::t('install', 'DB Host')])?>'},
                    dbport: {required: '<?=yii::t('install', '{attribute} cannot be empty', ['attribute' => yii::t('install', 'DB Port')])?>'},
                    dbuser: {required: '<?=yii::t('install', '{attribute} cannot be empty', ['attribute' => yii::t('install', 'DB Username')])?>'},
                    dbpw: {required: '<?=yii::t('install', '{attribute} cannot be empty', ['attribute' => yii::t('install', 'DB Password')])?>'},
                    dbname: {required: '<?=yii::t('install', '{attribute} cannot be empty', ['attribute' => yii::t('install', 'DB Name')])?>'},
                    dbprefix: {required: '<?=yii::t('install', '{attribute} cannot be empty', ['attribute' => yii::t('install', 'Table Prefix')])?>'},
                    manager: {required: '<?=yii::t('install', '{attribute} cannot be empty', ['attribute' => yii::t('install', 'Admin Username')])?>'},
                    manager_pwd: {required: '<?=yii::t('install', '{attribute} cannot be empty', ['attribute' => yii::t('install', 'Admin Password')])?>'},
                    manager_ckpwd: {
                        required: '<?=yii::t('install', '{attribute} cannot be empty', ['attribute' => yii::t('install', 'Repeat Password')])?>',
                        equalTo: '<?=yii::t('install', 'Repeat password is not equal password')?>.'
                    },
                    manager_email: {
                        required: '<?=yii::t('install', '{attribute} cannot be empty', ['attribute' => yii::t('install', 'Email')])?>',
                        email: '<?=yii::t('yii', 'Please input the correct email')?>'
                    }
                },
                submitHandler: function (form) {
                    layer.msg('<?=yii::t('install', 'Verifing, no refresh this window.')?>', {icon: 16, time: 0});
                    $(form).ajaxSubmit({
                        type: 'post',               //数据发送方式
                        dataType: 'json',           //接受数据格式
                        url: "<?=Url::to(['create-database'])?>",
                        success: function (data) {
                            $(".layui-layer").remove();
                            if (data.message == '') {
                                $("button[type=submit]").attr('disabled', true);
                                form.submit();
                            } else {
                                alert(data.message);
                            }
                        },
                        error: function (data) {
                            $(".layui-layer").remove();
                            alert(data.responseJSON.message);
                        }
                    });
                }
            });
        });
    </script>
<?php JsBlock::end() ?>