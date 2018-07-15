<!--Reset样式-->
<link href="/static/pay/jquery-ui.css" rel="stylesheet">
<link href="/static/pay/red-datepicker.css" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="/static/pay/charge.css" media="all">

<style type="text/css">#NIE-copyRight a{text-decoration: none;}#NIE-copyRight a:hover{text-decoration: underline;}</style><style>#haloword-pron { background: url(chrome-extension://bhkcehpnnlgncpnefpanachijmhikocj/img/icon.svg) -94px -34px; }#haloword-pron:hover { background: url(chrome-extension://bhkcehpnnlgncpnefpanachijmhikocj/img/icon.svg) -111px -34px; }#haloword-open { background: url(chrome-extension://bhkcehpnnlgncpnefpanachijmhikocj/img/icon.svg) -94px -17px; }#haloword-open:hover { background: url(chrome-extension://bhkcehpnnlgncpnefpanachijmhikocj/img/icon.svg) -111px -17px; }#haloword-close { background: url(chrome-extension://bhkcehpnnlgncpnefpanachijmhikocj/img/icon.svg) -94px 0; }#haloword-close:hover { background: url(chrome-extension://bhkcehpnnlgncpnefpanachijmhikocj/img/icon.svg) -111px 0; }#haloword-add { background: url(chrome-extension://bhkcehpnnlgncpnefpanachijmhikocj/img/icon.svg) -94px -51px; }#haloword-add:hover { background: url(chrome-extension://bhkcehpnnlgncpnefpanachijmhikocj/img/icon.svg) -111px -51px; }#haloword-remove { background: url(chrome-extension://bhkcehpnnlgncpnefpanachijmhikocj/img/icon.svg) -94px -68px; }#haloword-remove:hover { background: url(chrome-extension://bhkcehpnnlgncpnefpanachijmhikocj/img/icon.svg) -111px -68px; }</style></head>

<!--顶条-->
<div id="wrap">

    <div id="main">

        <script type="text/javascript">
            var cardProducts = {"101": {"par": 150, "name": "150\u70b9\u865a\u62df\u5361\u5bc6", "form": 2, "sale_price": 15.00000, "origin_price": 15.00000, "id": 101}, "102": {"par": 300, "name": "300\u70b9\u865a\u62df\u5361\u5bc6", "form": 2, "sale_price": 30.00000, "origin_price": 30.00000, "id": 102}, "103": {"par": 200, "name": "200\u70b9\u865a\u62df\u5361\u5bc6", "form": 2, "sale_price": 20.00000, "origin_price": 20.00000, "id": 103}, "104": {"par": 500, "name": "500\u70b9\u865a\u62df\u5361\u5bc6", "form": 2, "sale_price": 50.00000, "origin_price": 50.00000, "id": 104}, "106": {"par": 100, "name": "100\u70b9\u865a\u62df\u5361\u5bc6", "form": 2, "sale_price": 10.00000, "origin_price": 10.00000, "id": 106}, "107": {"par": 1000, "name": "Ecard\u865a\u62df\u5361\u5bc6", "form": 2, "sale_price": 100.00000, "origin_price": 100.00000, "id": 107}, "108": {"par": 3000, "name": "Ecard\u865a\u62df\u5361\u5bc6", "form": 2, "sale_price": 300.00000, "origin_price": 300.00000, "id": 108}, "109": {"par": 5000, "name": "Ecard\u865a\u62df\u5361\u5bc6", "form": 2, "sale_price": 500.00000, "origin_price": 500.00000, "id": 109}, "110": {"par": 10000, "name": "Ecard\u865a\u62df\u5361\u5bc6", "form": 2, "sale_price": 1000.00000, "origin_price": 1000.00000, "id": 110}};
            var pointProduct = {"par": 1, "name": "\u865a\u62df\u70b9\u6570", "form": 1, "sale_price": 0.10000, "origin_price": 0.10000, "id": 100};
            var maxCardMoney = 1000, maxPointAmout = 100000000;
            var pointSaleBase = 50;
            var logined = true;
            var enableCaptcha = false;
            var loginErr = false;
            var specialReasonVal = 4;
            var cardReasonVal = 3;
            var bank_pay = 2;
            var hkpay = 6;
            var rmbToDollar = 0.164;
        </script>
        <div class="content3" id="situation1">
            <form name="billForm" id="billForm" method="POST" action="http://ecard.163.com/submit">
                <input type="hidden" id="product_type" name="product_type" value="100">
                <input type="hidden" id="amount" name="amount" value="50">
                <input type="hidden" name="user_name" value="shenggxhz@163.com">
                <input type="hidden" name="platform" value="None">
                <input type="hidden" id="bank_code" name="bank_code" value="0001">



                <!--网上银行begin-->
                <div class="way choose_bank hide" id="bank_list" style="display: block;">
                    <p class="bold fltL">选择银行</p>
                    <div class="list list2">


                        <input type="radio" name="bank" id="bank_1" deposit="0001" credit="0071">
                        <label class="bank_label click" for="bank_1">
                            <img src="/static/pay/gongshang.png">
                        </label>

                        <input type="radio" name="bank" id="bank_2" deposit="0004" credit="0061">
                        <label class="bank_label" for="bank_2">
                            <img src="/static/pay/jianshe.png">
                        </label>

                        <input type="radio" name="bank" id="bank_3" deposit="0002" credit="0062">
                        <label class="bank_label" for="bank_3">
                            <img src="/static/pay/nongye.png">
                        </label>

                        <input type="radio" name="bank" id="bank_4" deposit="0009" credit="0060">
                        <label class="bank_label" for="bank_4">
                            <img src="/static/pay/zhongguo.png">
                        </label>

                        <input type="radio" name="bank" id="bank_5" deposit="0006" credit="0123">
                        <label class="bank_label" for="bank_5">
                            <img src="/static/pay/youchu.png">
                        </label>

                        <input type="radio" name="bank" id="bank_6" deposit="0014" credit="0059">
                        <label class="bank_label" for="bank_6">
                            <img src="/static/pay/jiaotong.png">
                        </label>

                        <input type="radio" name="bank" id="bank_7" deposit="0003" credit="0067">
                        <label class="bank_label" for="bank_7">
                            <img src="/static/pay/zhaoshang.png">
                        </label>

                        <input type="radio" name="bank" id="bank_9" deposit="0022" credit="0058">
                        <label class="bank_label" for="bank_9">
                            <img src="/static/pay/guangfa.png">
                        </label>

                        <input type="radio" name="bank" id="bank_10" deposit="0008" credit="0064">
                        <label class="bank_label" for="bank_10">
                            <img src="/static/pay/guangda.png">
                        </label>

                        <input type="radio" name="bank" id="bank_11" deposit="0011" credit="0070">
                        <label class="bank_label" for="bank_11">
                            <img src="/static/pay/pufa.png">
                        </label>

                        <input type="radio" name="bank" id="bank_12" deposit="0007" credit="0066">
                        <label class="bank_label" for="bank_12">
                            <img src="/static/pay/xingye.png">
                        </label>

                        <input type="radio" name="bank" id="bank_13" deposit="0204" credit="0231">
                        <label class="bank_label" for="bank_13">
                            <img src="/static/pay/pingan.png">
                        </label>

                        <input type="radio" name="bank" id="bank_14" deposit="0033" credit="0000">
                        <label class="bank_label" for="bank_14">
                            <img src="/static/pay/ningbo.png">
                        </label>

                        <input type="radio" name="bank" id="bank_15" deposit="0015" credit="0000">
                        <label class="bank_label" for="bank_15">
                            <img src="/static/pay/beijing.png">
                        </label>

                        <input type="radio" name="bank" id="bank_16" deposit="0016" credit="0129">
                        <label class="bank_label" for="bank_16">
                            <img src="/static/pay/huaxia.png">
                        </label>

                        <input type="radio" name="bank" id="bank_17" deposit="0019" credit="0000">
                        <label class="bank_label" style="display:none" for="bank_17">
                            <img src="/static/pay/bohai.png">
                        </label>

                        <input type="radio" name="bank" id="bank_18" deposit="0010" credit="0065">
                        <label class="bank_label" style="display:none" for="bank_18">
                            <img src="/static/pay/shenzhen.png">
                        </label>

                        <input type="radio" name="bank" id="bank_20" deposit="0034" credit="0000">
                        <label class="bank_label" style="display:none" for="bank_20">
                            <img src="/static/pay/nanjing.png">
                        </label>

                        <input type="radio" name="bank" id="bank_21" deposit="0200" credit="0000">
                        <label class="bank_label" style="display:none" for="bank_21">
                            <img src="/static/pay/zhongxin.png">
                        </label>

                        <input type="radio" name="bank" id="bank_22" deposit="0155" credit="0000">
                        <label class="bank_label" style="display:none" for="bank_22">
                            <img src="/static/pay/hangzhou.png">
                        </label>

                        <input type="radio" name="bank" id="bank_25" deposit="0301" credit="0302">
                        <label class="bank_label" style="display:none" for="bank_25">
                            <img src="/static/pay/shanghai.png">
                        </label>

                        <label id="more_bank">展开更多</label>
                    </div>
                </div>
                <!--网上银行end-->

                <div class="tip2 choose_type hide" id="pay_method_div" style="display: block;">
                    <p class="bold fltL">付款方式</p>
                    <div class="list" style="margin-bottom:0px;">
                        <input style="float: left" type="radio" name="pay_method" id="pay_deposit" value="deposit" checked="">
                        <label style="margin-right:20px; padding-left:10px; margin-top: 5px; float: left;" for="pay_deposit" >储蓄卡</label>
                        <input style="float: left" type="radio" name="pay_method" id="pay_credit" value="credit">
                        <label style="padding-left:10px;margin-top: 5px; float: left;" for="pay_credit">信用卡</label>

                    </div>
                </div>

                <div class="way" style="margin-top:10px;">
                    <p class="bold fltL">应付金额</p>
                    <p class="account"><span id="price">20.00</span>&nbsp;<span id="currency">元</span></p>

                    <span id="error" style="color: #d21b35"></span>

                </div>
                <div class="way" style="margin-top:10px;">
                    <button class="btn btn-primary" style="margin-left:100px" type=bmit" name="submit" id="submit" tabindex="5">
                        <i class="fa fa-check-square-o"></i> 提交订单                            </button>
                </div>
            </form>
        </div>





    </div>

</div>




<!-- jquery mix NIE (最新版本）-->

<script charset="gb2312" src="/static/pay/jquery.js"></script>
<script src="/static/pay/ntes.js" type="text/javascript"></script>
<script type="text/javascript">
    _ntes_nacc = "ecard";
    neteaseTracker();
</script>

<script charset="gb2312" src="/static/pay/online_card.js"></script>



<script>
    $(function(){


        $('#credit_input').click();
        $('#credit_products').children().first().click();

        $('#epay').next().click();
    });
</script>



<div id="haloword-lookup" class="ui-widget-content ui-draggable"><div id="haloword-title"><span id="haloword-word"></span><a herf="#" id="haloword-pron" class="haloword-button" title="发音"></a><audio id="haloword-audio"></audio><div id="haloword-control-container"><a herf="#" id="haloword-add" class="haloword-button" title="加入单词表"></a><a herf="#" id="haloword-remove" class="haloword-button" title="移出单词表"></a><a href="http://ecard.163.com/ecard#" id="haloword-open" class="haloword-button" title="查看单词详细释义" target="_blank"></a><a herf="#" id="haloword-close" class="haloword-button" title="关闭查询窗"></a></div><br style="clear: both;"></div><div id="haloword-content"></div></div>