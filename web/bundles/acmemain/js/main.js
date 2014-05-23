// 注册弹窗
function register(){
	$.layer({
		type: 1,
		title: false,
		area: ['420px', '260px'],
		shade: [0],
		page: {
			html: 'a'
		}, success: function(){
			layer.shift('left');
		}
	});
}

// 登录弹窗
function login(){
	$.layer({
		type: 1,
		title: false,
		area: ['420px', '260px'],
		shade: [0],
		page: {
			html: 'a'
		}, success: function(){
			layer.shift('left');
		}
	});
}

// 点击图片放大插件
layer.use('layer.ext.js', function(){
    //初始加载即调用，所以需放在ext回调里
    layer.ext = function(){
        layer.photosPage({
            html: '<div class="xubox_msg"><p>这里传入自定义的html<p>相册支持左右方向键，支持Esc关闭</p><p>另外还可以通过异步返回json实现相册。更多用法详见官网。</p><p>'
			      +
			      '</p><p id="change"></p></div>',
            title: '快捷模式-获取页面元素包含的所有图片',
            id: 112,
            parent: '#imgs'
        });
    };
});
// 点击图片放大插件
$('#imgs a img').on('click',function(event){
	var height = $(window).height(), index = $.layer({
		type : 2,
		fix : false,
		shade : [0.5 , '#000000' , true],
		shadeClose : true,
		border : [!0],
		title : false,
		offset : ['25px',''],
		area : ['90%', (height - 50)+'px'],
		iframe : {src : $(this).attr('href')}
	});
    event.preventDefault();
});