@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="container">
	<div class="block-main">
		<h2 class="head">Hướng dẫn mua hàng</h2>
		<div class="block-accordion shopguide-content">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		        <div class="panel panel-default">
		            <div class="panel-heading" role="tab" id="headingOne">
		                <h4 class="panel-title">
		                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		                        <i class="more-less fa fa-caret-right"></i>
		                        CÁCH MUA HÀNG
		                    </a>
		                </h4>
		            </div>
		            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
		                <div class="panel-body">
		                	<h3>Mua sắm tại LAHAVA thật dễ dàng. Quý khách chỉ cần làm theo các bước sau:</h3>
		                	<ol class="decimal-list">
							    <li>Ch&#7885;n danh m&#7909;c s&#7843;n ph&#7849;m (&Aacute;o d&agrave;i, v&aacute;y d&#7841; h&#7897;i, v&aacute;y c&#432;&#7899;i...) r&#7891;i ch&#7885;n lo&#7841;i s&#7843;n ph&#7849;m (&aacute;o d&agrave;i c&#432;&#7899;i, &aacute;o d&agrave;i trung ni&ecirc;n, &aacute;o d&agrave;i nam, v.v.).</li>
							    <li>Xem s&#7843;n ph&#7849;m qu&yacute; kh&aacute;ch quan t&acirc;m r&#7891;i nh&#7845;p v&agrave;o &#7843;nh &#273;&#7875; ph&oacute;ng to v&agrave; xem m&#7885;i chi ti&#7871;t.</li>
							    <li>Ch&#7885;n m&#7863;t h&agrave;ng qu&#7847;n &aacute;o v&agrave; th&ecirc;m m&#7863;t h&agrave;ng v&agrave;o gi&#7887;. Sau &#273;&oacute;, qu&yacute; kh&aacute;ch c&oacute; th&#7875; ch&#7885;n ti&#7871;p t&#7909;c mua s&#7855;m ho&#7863;c x&#7917; l&yacute; &#273;&#417;n h&agrave;ng.</li>
							    <li>&#272;&#7875; x&#7917; l&yacute; &#273;&#417;n h&agrave;ng, qu&yacute; kh&aacute;ch ch&#7881; c&#7847;n nh&#7853;p &#273;&#7847;y &#273;&#7911; th&ocirc;ng tin c&#7911;a m&igrave;nh.</li>
							    <li>X&aacute;c nh&#7853;n &#273;&#417;n h&agrave;ng.</li>
							    <li>Qu&yacute; kh&aacute;ch s&#7869; nh&#7853;n &#273;&#432;&#7907;c email x&aacute;c nh&#7853;n &#273;&#417;n h&agrave;ng.</li>
							    
							</ol>
		                </div>
		            </div>
		        </div>
		        <div class="panel panel-default">
		            <div class="panel-heading" role="tab" id="headingTwo">
		                <h4 class="panel-title">
		                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		                        <i class="more-less fa fa-caret-right"></i>
		                        THÔNG TIN CHUNG
		                    </a>
		                </h4>
		            </div>
		            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		                <div class="panel-body">- T&#7845;t c&#7843; s&#7843;n ph&#7849;m l&agrave; kh&ocirc;ng cho thu&ecirc;.<br />
	- Gi&aacute; kh&ocirc;ng bao g&#7891;m ph&#7909; ki&#7879;n (m&#7845;n, l&uacute;p, n&#7883;t...)<br />
	- Th&#7901;i gian may kho&#7843;ng 2 &#273;&#7871;n 3 tu&#7847;n.<br />
	- Nh&#7853;n thi&#7871;t k&#7871; theo m&#7851;u kh&aacute;ch h&agrave;ng cung c&#7845;p.
		                </div>
		            </div>
		        </div>
		        <div class="panel panel-default">
		            <div class="panel-heading" role="tab" id="headingThree">
		                <h4 class="panel-title">
		                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		                        <i class="more-less fa fa-caret-right"></i>
		                        THANH TOÁN
		                    </a>
		                </h4>
		            </div>
		            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
	                	<div class="panel-body"><p>
	-:- &nbsp;<strong>TRONG N&#431;&#7898;C</strong>
</p>

<p>
	+ TP.HCM<br />
	&ndash; &nbsp;Thanh to&aacute;n tr&#7921;c ti&#7871;p t&#7841;i LAHAVA, s&#7889; 84 Nguy&#7877;n V&#259;n Tr&#7895;i, Ph&#432;&#7901;ng 8, Ph&uacute; nhu&#7853;n, HCM<br />
	&ndash; &nbsp;Ho&#7863;c chuy&#7875;n kho&#7843;n ng&acirc;n h&agrave;ng v&#7899;i c&aacute;c t&agrave;i kho&#7843;n li&#7879;t k&ecirc; b&ecirc;n d&#432;&#7899;i.<br />
	+ T&#7880;NH TH&Agrave;NH<br />
	&ndash; &nbsp;Nh&#7901; ng&#432;&#7901;i th&acirc;n s&#7889;ng t&#7841;i Tp.HCM thanh to&aacute;n gi&uacute;p.<br />
	&ndash; &nbsp;Chuy&#7875;n kho&#7843;n ng&acirc;n h&agrave;ng v&#7899;i c&aacute;c t&agrave;i kho&#7843;n b&ecirc;n d&#432;&#7899;i.
</p>

<p>
	-:- &nbsp;<strong>NGO&Agrave;I N&#431;&#7898;C</strong>
</p>

<p>
	&ndash; &nbsp;N&#7871;u b&#7841;n &#273;ang s&#7889;ng &#7903; n&#432;&#7899;c ngo&agrave;i, vui l&ograve;ng thanh to&aacute;n qua c&aacute;ch d&#7883;ch v&#7909; qu&#7889;c t&#7871; nh&#432; Western Union, Ki&#7873;u h&#7889;i (Remittance Services)<br />
	&ndash;&nbsp; Nh&#7901; ng&#432;&#7901;i th&acirc;n t&#7841;i Vi&#7879;t nam.<br />
	&nbsp;
</p>

<h3>
	<span style="text-decoration: underline;">DANH S&Aacute;CH T&Agrave;I KHO&#7842;N T&#7840;I VI&#7878;T NAM</span>
</h3>

<p>
	<span style="color: #333300;"><strong>NG&Acirc;N H&Agrave;NG &#272;&Ocirc;NG &Aacute;- Chi nh&aacute;nh QUANG TRUNG, G&Ograve; V&#7844;P, TP.HCM</strong></span>
</p>

<p>
	NGUY&#7876;N LAN ANH<br />
	STK:&nbsp;<strong>010 333 5115</strong>
</p>

<p>
	<span style="color: #000080;"><strong>NG&Acirc;N H&Agrave;NG AGRIBANK- Chi nh&aacute;nh T&Acirc;Y S&Agrave;I G&Ograve;N,TP.HCM</strong></span>
</p>

<p>
	NGUY&#7876;N LAN ANH<br />
	STK:&nbsp;<strong><span style="color:#000000;">6320 2050 12847</span>&nbsp;</strong>
</p>

<p>
	<span style="color: #800000;"><strong>NG&Acirc;N H&Agrave;NG VIETCOMBANK-PGD QUANG TRUNG,Chi nh&aacute;nh TPHCM</strong></span>
</p>

<p>
	NGUY&#7876;N LAN ANH<br />
	STK:&nbsp;&nbsp;<span style="color:#000000;"><strong>007 100 4634 717</strong></span>
</p>

<p>
	<span style="color: #ff00ff;"><strong>NG&Acirc;N H&Agrave;NG VIETTINBANK- Chi nh&aacute;nh 1, TP.HCM</strong></span>
</p>

<p>
	NGUY&#7876;N LAN ANH<br />
	STK:&nbsp;&nbsp;<span style="color:#000000;"><strong>711A21133234</strong></span>
</p>

<p>
	<span style="color: #800080;"><strong>NG&Acirc;N H&Agrave;NG SACOMBANK- Chi nh&aacute;nh H&oacute;c M&ocirc;n, TP.HCM</strong></span>
</p>

<p>
	NGUY&#7876;N LAN ANH<br />
	STK: &nbsp;<span style="color:#000000;"><strong>0600 5762 6499</strong></span>
</p>

<p>
	<span style="color: #003366;"><strong>NG&Acirc;N H&Agrave;NG BIDV Bank- Chi nh&aacute;nh Gia &#272;&#7883;nh, TP.HCM</strong></span>
</p>

<p>
	NGUY&#7876;N LAN ANH<br />
	STK: &nbsp;<span style="color:#000000;"><strong>1351 0000 529 066</strong></span>
</p>

	<p>
		<span style="color: #993300;"><strong>NG&Acirc;N H&Agrave;NG Techcombank- Chi nh&aacute;nh Ph&uacute; nhu&#7853;n, TP.HCM</strong></span>
	</p>

	<p>
		NGUY&#7876;N LAN ANH<br />
		STK: &nbsp;<span style="color:#000000;"><strong>1902 8501 565 019</strong></span>
	</p>
		            </div>
		        </div>
		        <div class="panel panel-default">
		            <div class="panel-heading" role="tab" id="headingFour">
		                <h4 class="panel-title">
		                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
		                        <i class="more-less fa fa-caret-right"></i>
		                        GIAO HÀNG
		                    </a>
		                </h4>
		            </div>
		            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
	                	<div class="panel-body">- Mi&#7877;n ph&iacute; giao h&agrave;ng trong n&#432;&#7899;c, th&#7901;i gian giao h&agrave;ng m&#7845;t kho&#7843;ng 2 &#273;&#7871;n 3 ng&agrave;y l&agrave;m vi&#7879;c.<br />
	- Giao h&agrave;ng qu&#7889;c t&#7871; th&#7901;i gian m&#7845;t kho&#7843;ng 2 &#273;&#7871;n 4 ng&agrave;y l&agrave;m vi&#7879;c. Chi ph&iacute; t&ugrave;y thu&#7897;c v&agrave;o c&acirc;n n&#7863;ng ho&#7863;c th&#7875; t&iacute;ch c&#7911;a g&oacute;i h&agrave;ng.</div>
		            </div>
		        </div>
		        <div class="panel panel-default">
		            <div class="panel-heading" role="tab" id="headingFive">
		                <h4 class="panel-title">
		                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
		                        <i class="more-less fa fa-caret-right"></i>
		                        &#272;&#7892;I - TR&#7842; H&Agrave;NG
		                    </a>
		                </h4>
		            </div>
		            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
	                	<div class="panel-body">- Sau khi &#273;&#7863;t h&agrave;ng, qu&yacute; kh&aacute;ch c&#361;ng c&oacute; th&#7875; thay &#273;&#7893;i m&agrave;u s&#7855;c, ch&#7845;t li&#7879;u ho&#7863;c c&aacute;c chi ti&#7871;t nh&#7887; ngay sau &#273;&oacute; n&#7871;u &#273;&#417;n h&agrave;ng c&#7911;a qu&yacute; kh&aacute;ch ch&#432;a &#273;&#432;&#7907;c l&ecirc;n l&#7883;ch v&agrave; chuy&#7875;n v&agrave;o ph&ograve;ng thi&#7871;t k&#7871;.<br />
	- Kh&ocirc;ng &#273;&#432;&#7907;c thay &#273;&#7893;i m&#7851;u m&#7851;, ki&#7875;u d&aacute;ng ho&#7863;c form &aacute;o. Tuy nhi&ecirc;n trong m&#7897;t s&#7889; tr&#432;&#7901;ng h&#7907;p, ch&uacute;ng t&ocirc;i s&#7869; xem x&eacute;t l&#7841;i.<br />
	- H&agrave;ng qu&yacute; kh&aacute;ch &#273;&atilde; &#273;&#7863;t vui l&ograve;ng kh&ocirc;ng tr&#7843;, ch&uacute;ng t&ocirc;i c&#361;ng kh&ocirc;ng gi&#7843;i quy&#7871;t c&aacute;c tr&#432;&#7901;ng h&#7907;p h&#7911;y &#273;&#417;n h&agrave;ng.<br />
	- Tr&#432;&#7901;ng h&#7907;p s&#7843;n ph&#7849;m qu&yacute; kh&aacute;ch nh&#7853;n &#273;&#432;&#7907;c kh&ocirc;ng v&#7915;a v&#7863;n, r&#7897;ng ch&#7853;t... Ch&uacute;ng t&ocirc;i s&#7869; kh&#7855;c ph&#7909;c, b&oacute;p n&#7899;i, c&#7855;t line... mi&#7877;n ph&iacute; cho qu&yacute; kh&aacute;ch.</div>
		            </div>
		        </div>
		        <div class="panel panel-default">
		            <div class="panel-heading" role="tab" id="headingSix">
		                <h4 class="panel-title">
		                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
		                        <i class="more-less fa fa-caret-right"></i>
		                        B&#7842;O M&#7852;T
		                    </a>
		                </h4>
		            </div>
		            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
	                	<div class="panel-body">Th&ocirc;ng tin b&#7841;n cung c&#7845;p khi &#273;&#259;ng k&yacute; t&#7841;i website ch&#7881; c&oacute; t&iacute;nh ch&#7845;t gi&uacute;p ch&uacute;ng t&ocirc;i ho&agrave;n t&#7845;t &#273;&#417;n h&agrave;ng c&#7911;a b&#7841;n m&#7897;t c&aacute;ch s&#7899;m v&agrave; ch&iacute;nh x&aacute;c nh&#7845;t, v&agrave; nh&#7919;ng th&ocirc;ng tin n&agrave;y s&#7869; &#273;&#432;&#7907;c b&#7843;o m&#7853;t tuy&#7879;t &#273;&#7889;i.</div>
		            </div>
		        
		        
		        
			
		</div>
	</div>
	@include('frontend.partials.footer-2')
</div><!-- /.container -->
@stop