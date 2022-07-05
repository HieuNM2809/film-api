{{--  <!-- FOOTER -->
<!--===================================================-->
<footer id="footer">

    <!-- Visible when footer positions are fixed -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="show-fixed pull-right">
        <ul class="footer-list list-inline">
            <li>
                <p class="text-sm">SEO Proggres</p>
                <div class="progress progress-sm progress-light-base">
                    <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                </div>
            </li>

            <li>
                <p class="text-sm">Online Tutorial</p>
                <div class="progress progress-sm progress-light-base">
                    <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                </div>
            </li>
            <li>
                <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
            </li>
        </ul>
    </div>



    <!-- Visible when footer positions are static -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="hide-fixed pull-right pad-rgt">Currently v2.2</div>



    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

    <p class="pad-lft">&#0169; 2015 Your Company</p>



</footer>  --}}
<!--===================================================-->
<!-- END FOOTER -->


<!-- SCROLL TOP BUTTON -->
<!--===================================================-->
<button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
<!--===================================================-->

<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="vertical-align: top;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
      </div>
    </div>
  </div>
<!--===================================================-->
<!-- END OF CONTAINER -->

<!-- SETTINGS - DEMO PURPOSE ONLY -->
<!--===================================================-->
{{--  <div id="demo-set" class="demo-set">
    <div class="demo-set-body bg-dark">
        <div id="demo-set-alert"></div>
        <div class="demo-set-content clearfix">
            <div class="col-xs-6 col-md-4">
                <h4 class="text-lg mar-btm">Animations</h4>
                <div id="demo-anim" class="mar-btm">
                    <label class="form-checkbox form-icon active">
                        <input type="checkbox" checked=""> Enable Animations
                    </label>
                </div>
                <p>Transition effects</p>
                <select id="demo-ease">
                    <option value="effect" selected>ease (Default)</option>
                    <option value="easeInQuart">easeInQuart</option>
                    <option value="easeOutQuart">easeOutQuart</option>
                    <option value="easeInBack">easeInBack</option>
                    <option value="easeOutBack">easeOutBack</option>
                    <option value="easeInOutBack">easeInOutBack</option>
                    <option value="steps">Steps</option>
                    <option value="jumping">Jumping</option>
                    <option value="rubber">Rubber</option>
                </select>
                <hr class="bord-no">
                <br>
                <h4 class="text-lg mar-btm">Navigation</h4>
                <div class="mar-btm">
                    <label id="demo-nav-fixed" class="form-checkbox form-icon">
                        <input type="checkbox"> Fixed
                    </label>
                </div>
                <label id="demo-nav-coll" class="form-checkbox form-icon">
                    <input type="checkbox"> Collapsed
                </label>
                <hr class="bord-no">
                <br>
                <h4 class="text-lg mar-btm">Off Canvas Navigation</h4>
                <select id="demo-nav-offcanvas">
                    <option value="none" selected disabled="disabled">-- Select Mode --</option>
                    <option value="push">Push</option>
                    <option value="slide">Slide in on top</option>
                    <option value="reveal">Reveal</option>
                </select>
            </div>
            <div class="col-xs-6 col-md-3">
                <h4 class="text-lg mar-btm">Aside</h4>
                <div class="form-block">
                    <label id="demo-asd-vis" class="form-checkbox form-icon">
                        <input type="checkbox"> Visible
                    </label>
                    <label id="demo-asd-fixed" class="form-checkbox form-icon">
                        <input type="checkbox"> Fixed
                    </label>
                    <label id="demo-asd-align" class="form-checkbox form-icon">
                        <input type="checkbox"> Aside on the left side
                    </label>
                    <label id="demo-asd-themes" class="form-checkbox form-icon">
                        <input type="checkbox"> Bright Theme
                    </label>
                </div>
                <hr class="bord-no">
                <br>
                <h4 class="text-lg mar-btm">Header / Navbar</h4>
                <label id="demo-navbar-fixed" class="form-checkbox form-icon">
                    <input type="checkbox"> Fixed
                </label>
                <hr class="bord-no">
                <br>
                <h4 class="text-lg mar-btm">Footer</h4>
                <label id="demo-footer-fixed" class="form-checkbox form-icon">
                    <input type="checkbox"> Fixed
                </label>
            </div>
            <div class="col-xs-12 col-md-5">
                <div id="demo-theme">
                    <h4 class="text-lg mar-btm">Color Themes</h4>
                    <div class="demo-theme-btn">
                        <a href="#" class="demo-theme demo-a-light add-tooltip" data-theme="theme-light" data-type="a"
                            data-title="(A). Light">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-a-navy add-tooltip" data-theme="theme-navy" data-type="a"
                            data-title="(A). Navy Blue">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-a-ocean add-tooltip" data-theme="theme-ocean" data-type="a"
                            data-title="(A). Ocean">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-a-lime add-tooltip" data-theme="theme-lime" data-type="a"
                            data-title="(A). Lime">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-a-purple add-tooltip" data-theme="theme-purple" data-type="a"
                            data-title="(A). Purple">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-a-dust add-tooltip" data-theme="theme-dust" data-type="a"
                            data-title="(A). Dust">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-a-mint add-tooltip" data-theme="theme-mint" data-type="a"
                            data-title="(A). Mint">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-a-yellow add-tooltip" data-theme="theme-yellow" data-type="a"
                            data-title="(A). Yellow">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-a-well-red add-tooltip" data-theme="theme-well-red"
                            data-type="a" data-title="(A). Well Red">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-a-coffee add-tooltip" data-theme="theme-coffee" data-type="a"
                            data-title="(A). Coffee">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-a-prickly-pear add-tooltip" data-theme="theme-prickly-pear"
                            data-type="a" data-title="(A). Prickly pear">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-a-dark add-tooltip" data-theme="theme-dark" data-type="a"
                            data-title="(A). Dark">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                    </div>
                    <div class="demo-theme-btn">
                        <a href="#" class="demo-theme demo-b-light add-tooltip" data-theme="theme-light" data-type="b"
                            data-title="(B). Light">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-b-navy add-tooltip" data-theme="theme-navy" data-type="b"
                            data-title="(B). Navy Blue">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-b-ocean add-tooltip" data-theme="theme-ocean" data-type="b"
                            data-title="(B). Ocean">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-b-lime add-tooltip" data-theme="theme-lime" data-type="b"
                            data-title="(B). Lime">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-b-purple add-tooltip" data-theme="theme-purple"
                            data-type="b" data-title="(B). Purple">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-b-dust add-tooltip" data-theme="theme-dust" data-type="b"
                            data-title="(B). Dust">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-b-mint add-tooltip" data-theme="theme-mint" data-type="b"
                            data-title="(B). Mint">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-b-yellow add-tooltip" data-theme="theme-yellow"
                            data-type="b" data-title="(B). Yellow">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-b-well-red add-tooltip" data-theme="theme-well-red"
                            data-type="b" data-title="(B). Well red">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-b-coffee add-tooltip" data-theme="theme-coffee"
                            data-type="b" data-title="(B). Coofee">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-b-prickly-pear add-tooltip" data-theme="theme-prickly-pear"
                            data-type="b" data-title="(B). Prickly pear">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-b-dark add-tooltip" data-theme="theme-dark" data-type="b"
                            data-title="(B). Dark">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                    </div>
                    <div class="demo-theme-btn">
                        <a href="#" class="demo-theme demo-c-light add-tooltip" data-theme="theme-light" data-type="c"
                            data-title="(C). Light">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-c-navy add-tooltip" data-theme="theme-navy" data-type="c"
                            data-title="(C). Navy Blue">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-c-ocean add-tooltip" data-theme="theme-ocean" data-type="c"
                            data-title="(C). Ocean">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-c-lime add-tooltip" data-theme="theme-lime" data-type="c"
                            data-title="(C). Lime">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-c-purple add-tooltip" data-theme="theme-purple"
                            data-type="c" data-title="(C). Purple">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-c-dust add-tooltip" data-theme="theme-dust" data-type="c"
                            data-title="(C). Dust">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-c-mint add-tooltip" data-theme="theme-mint" data-type="c"
                            data-title="(C). Mint">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-c-yellow add-tooltip" data-theme="theme-yellow"
                            data-type="c" data-title="(C). Yellow">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-c-well-red add-tooltip" data-theme="theme-well-red"
                            data-type="c" data-title="(C). Well Red">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-c-coffee add-tooltip" data-theme="theme-coffee"
                            data-type="c" data-title="(C). Coffee">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-c-prickly-pear add-tooltip" data-theme="theme-prickly-pear"
                            data-type="c" data-title="(C). Prickly pear">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                        <a href="#" class="demo-theme demo-c-dark add-tooltip" data-theme="theme-dark" data-type="c"
                            data-title="(C). Dark">
                            <div class="demo-theme-brand"></div>
                            <div class="demo-theme-head"></div>
                            <div class="demo-theme-nav"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pad-all text-left">
            <hr class="hr-sm">
            <p class="demo-set-save-text">* All settings will be saved automatically.</p>
            <button id="demo-reset-settings" class="btn btn-primary btn-labeled fa fa-refresh mar-btm">Restore Default
                Settings</button>
        </div>
    </div>
    <button id="demo-set-btn" class="btn btn-sm"><i class="fa fa-cog fa-2x"></i></button>
</div>  --}}
<!--===================================================-->
<!-- END SETTINGS -->
<!--JAVASCRIPT-->
<!--=================================================-->

<!--jQuery [ REQUIRED ]-->
<script src="{{ asset('backend/js/jquery-2.1.1.min.js') }}"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>


<!--Fast Click [ OPTIONAL ]-->
<script src="{{ asset('backend/plugins/fast-click/fastclick.min.js') }}"></script>


<!--Nifty backend [ RECOMMENDED ]-->
<script src="{{ asset('backend/js/nifty.min.js') }}"></script>


<!--Morris.js [ OPTIONAL ]-->
<script src="{{ asset('backend/plugins/morris-js/morris.min.js') }}"></script>
<script src="{{ asset('backend/plugins/morris-js/raphael-js/raphael.min.js') }}"></script>


<!--Sparkline [ OPTIONAL ]-->
<script src="{{ asset('backend/plugins/sparkline/jquery.sparkline.min.js') }}"></script>


<!--Skycons [ OPTIONAL ]-->
<script src="{{ asset('backend/plugins/skycons/skycons.min.js') }}"></script>


<!--Switchery [ OPTIONAL ]-->
<script src="{{ asset('backend/plugins/switchery/switchery.min.js') }}"></script>


<!--Bootstrap Select [ OPTIONAL ]-->
<script src="{{ asset('backend/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>


<!--Demo script [ DEMONSTRATION ]-->
<script src="{{ asset('backend/js/demo/nifty-demo.min.js') }}"></script>


<!--Specify page [ SAMPLE ]-->
<script src="{{ asset('backend/js/demo/dashboard.js') }}"></script>


<!--

 REQUIRED
 You must include this in your project.

 RECOMMENDED
 This category must be included but you may modify which plugins or components which should be included in your project.

 OPTIONAL
 Optional plugins. You may choose whether to include it in your project or not.

 DEMONSTRATION
 This is to be removed, used for demonstration purposes only. This category must not be included in your project.

 SAMPLE
 Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


 Detailed information and more samples can be found in the document.

 -->
 <script src="<?php echo $LINK_NAME_SOCKET ?>/socket.io/socket.io.js"></script>
 <script>
    CKEDITOR.replace('contentAlert');
    var socket = io("<?php echo $LINK_NAME_SOCKET ?>");
    var btnFrmSendAlert  = $('#frmSendAlert #btnSend');
    var title            = $('#frmSendAlert #titleAlert');
    var content          =  '';
    var token            = '{{csrf_token()}}';
    var clickAudio        =  $('#clickAudioPost');
    var audioPost        =  $('#audioPost');
    console.log(clickAudio);
    btnFrmSendAlert.click(function() {
        content =  CKEDITOR.instances['contentAlert'].getData();
        if ( title.val() && content) {
            socket.emit('client-send-alert', title.val(), content);

            // insert data alert admin
            $.ajax({
                type: "POST",
                url: baseUrl + "/admin/create-alert",
                dataType: 'json',
                data: {
                    title: title.val() ,
                    _token:token,
                    content: content,
                    id_user: {{Session::get('logged_in_admin')['id']}}
                },
                beforeSend: function() {
                },
                success: function(res){
                },
                complete: function() {
                }
            });

            title.val('');
            CKEDITOR.instances['contentAlert'].setData('');
        }else{
            alert('Vui lòng nhập đầy đủ thông tin !!');
        }
    });

    clickAudio.click(function(e) {
        var value =  CKEDITOR.instances.contentAlert.document.getBody().getText();
        $.ajax({
            type: "GET",
            url: "<?php echo url('/api/text-to-speech'); ?>" + '/'+value,
            success: function(res) {
                var data = JSON.parse(res);
                if (data.error == 0){
                   var html =  `<audio controls autoplay>
                    <source src="`+data.async+`" type="audio/mpeg">
                    Your browser does not support the audio element.
                   </audio>`;
                   audioPost.html(html);
                }else{
                    alert('Có lỗi xảy ra, vui lòng thử lại !!');
                }
            }
        });
    });

    socket.on('server-send-alert', function(data) {
        var popupAlert = $('#popupAlert');
        var modalTitle = $('#popupAlert .modal-title');
        var modalBody  = $('#popupAlert .modal-body');

        $('#myModalInfo .modal-title').html(data.title);
        $('#myModalInfo .modal-body').html(data.content);
        $("#myModalInfo").modal('show');
    });

   {{--  ==========================  nhắn tin   ================================== --}}
    var lisUserOnline = $('.main-message .lisUserOnline');
    var logout = $('.main-message #logout');
    var btnSend = $('.main-message #btnSend');
    var valSend = $('.main-message #valSend');
    var listMessage = $('.main-message .listMessage');
    $('.main-message .home').hide();
    $('.main-message .login').show();

    // click login
    $('.main-message #login_m').click((e)=>{
        // gửi user cho serve để kiểm tra trùng, nếu ko trùng thì hiển thị màn hình message
        if($('.main-message #name').val()){
            socket.emit('client-send-Username', $('.main-message #name').val());
        }else{
            alert('Vui lòng nhập username');
        }
    });

    // lắng nghe sự kiện thông báo
    socket.on('server-send-dki-thatbai', (data)=>{
        alert(data.messge);
    });

    //lắng nghe danh sách user thay đổi
    socket.on('server-send-danhsach-Users', (data)=>{
        // data.listUser
        lisUserOnline.html('');
        data.listUser.forEach(item => {
            lisUserOnline.append(itemUserOnline(item));
        });
    });

    //lắng nge sự kiện đăng ký thành công
    socket.on('server-send-dki-thanhcong', (data)=>{
        $('.main-message #nameMe').text(data.user);
        $('.main-message .login').hide();
        $('.main-message .home').show();
    });

    {{--  // logout
    logout.click(()=>{
        socket.emit('logout');
        location.reload();
    });  --}}

    btnSend.click(()=>{
        if(valSend.val()){
            socket.emit('client-send-messge', valSend.val());
            valSend.val('');

            {{--  var scrollTo = $('.main-message .other-message').last();
            var container = $('.listMessage');
            var position = scrollTo.offset().top - container.offset().top + container.scrollTop();
            container.animate({
                scrollTop: position
            });  --}}
        }
    });

    // nhận messge
    socket.on('server-send-messge-to-me',(data)=>{
        listMessage.append(itemMessageToMe(data.user , data.message));

        {{--  var element = $('.main-message .other-message').last();
        element.scrollTo(0, $('.listMessage').scrollHeight);  --}}
    });
    socket.on('server-send-messge-broadcast',(data)=>{
        listMessage.append(itemMessgeBroadcast(data.user , data.message));

        {{--  const element = $('.main-message .other-message').last();
        element.scrollTo(0, $('.listMessage').scrollHeight);  --}}
    });

    // nhấn vào input gửi
    $('.main-message #valSend').focusin((e)=>{
        socket.emit('typing');
    });
    socket.on('server-send-typing', (data)=>{
        if(data.listUserTyping.length !=0){
            var html = '<img width="40px;" src="LoadEllipsis.gif" alt="">';
            data.listUserTyping.forEach(item => {
                html += item + ', ';
            });
            html+= 'đang gõ chữ';
            $('.main-message #typing').html(html);
            $('.main-message #typing').show();
        }else{
            $('.main-message #typing').hide();
        }

    });

    $('.main-message #valSend').focusout((e)=>{
        socket.emit('typing-close');
    });

    function itemUserOnline(userName) {
        return  `<li class="clearfix">
        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
            <div class="about">
                <div class="name">${userName}</div>
                <div class="status"> <i class="fa fa-circle online"></i> online </div>
            </div>
        </li>`;
    }

    function itemMessageToMe(username, message) {
       return ` <li class="clearfix">
                    <div class="message-data text-right">
                        <span class="message-data-time">${username}</span>
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                    </div>
                    <div class="message other-message float-right">${message}</div>
                </li>`;
    }
    function itemMessgeBroadcast(username, message) {
        return `<li class="clearfix">
                    <div class="message-data">
                        <span class="message-data-time">${username}</span>
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                    </div>
                    <div class="message my-message">${message}</div>
                </li>`;
    }
</script>

