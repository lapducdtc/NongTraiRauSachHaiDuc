﻿
$(function(){
		// Số lượng hình anh hiển thị
		var display_image_number =4;
		
		// Method = 1: Sau khi chạm đến giới hạn slide, slide stage sẽ trượt thẳng về vị trí cuối cùng hoặc đầu tiên
		// Method = 2: Sau khi chạm đến giới hạn slide, slide sẽ được quay vòng qua từng hình
		var circle_method = 2;
		
		// Tốc độ dịch chuyển của hình ảnh (đơn vị: milisecond)
		var anispeed = 500;
		
		// 1 = Kích hoạt, 0 = Không kích hoạt chế độ tự động cuốn hình slide
		var auto_scroll = 1;
		
		// Nếu giá trị auto_scroll = 1 thì có thể điều chỉnh giá trị sau để thay đổi thời gian cuộn
		var timeinterval = 1500;
		
	
	// ========= Xác định các thông số cơ bản của slideshow =========

	// Xác định số lượng hình của slide, chiều rộng của mỗi hình để tìm ra độ rộng của stage
	var image_count = $('.slide-image1').length;
	var image_width = $('.slide-image1').width();
		// Độ rộng của hình ảnh có thể chỉnh sửa bằng css
		// Độ rộng này quan trọng vì nó sẽ ảnh hưởng đến độ rộng của toàn bộ slide, cần được tính toán cẩn thận
	var stage_width = image_width * image_count;
	// Xác định chiều rộng của khung hiển thị slide
	var display_width = display_image_number * image_width;
	
	// Chỉnh độ dài slide stage tương ứng với số lượng hình cần hiển thị thông qua display_width
	$('.slide-holder1').css("width", display_width + "px");
	
	// Chỉnh lại độ dài của khối bao quanh các slide-image1 (slide-stage1) cho vừa bằng tổng số khối slide-image1
	$('.slide-stage1').css("width", stage_width + "px");
	

	// ========= Xử lý khi click nút next và prev =========
	
	function left_slide_circle(){
		$('.slide-image1:last-child').addClass('swapthis'); // Xác định hình đang ở vị trí cuối cùng
		$('.swapthis').insertBefore('.slide-image1:first'); // Chuyển hình cuối lên trước hình đầu tiên
		$('.slide-stage1').css("left",-image_width + "px"); // Dịch chuyển tức thời vị trí của stage sang một khoảng bằng 1 slide-image1
		$('.slide-stage1').stop().animate({left:0},anispeed); // Thực hiện animation
		$('.swapthis').removeClass('swapthis'); // Reset class cho slide-image1 vừa chuyển
	}
	function right_slide_circle(){
		$('.slide-image1:first').addClass('swapthis'); // Xác định hình đang ở vị trí cuối cùng
		$('.swapthis').insertAfter('.slide-image1:last-child'); // Chuyển hình cuối lên trước hình đầu tiên
		$('.slide-stage1').css("left",-(stage_width - image_width - display_width) + "px"); // Dịch chuyển tức thời vị trí của stage sang một khoảng bằng 1 slide-image1
		$('.slide-stage1').stop().animate({left:display_width - stage_width},anispeed); // Thực hiện animation
		$('.swapthis').removeClass('swapthis'); // Reset class cho slide-image1 vừa chuyển
	}
	function left_slide_scroll(){
		// Xác định xem slide có còn hình phía bên trái hay không dựa trên Left của stage
		var stage_left = $('.slide-stage1').position().left;
		
		// Nếu có
		if(stage_left < 0 && !$('.slide-stage1').is(':animated')){ //Kích hoạt chỉ khi stage ko chuyển động nữa
			$('.slide-stage1').stop().animate({left:"+=" + image_width},anispeed);
		}
		else // Nếu đã chuyển về hình ảnh đầu tiên thì lựa chọn cách thức quay vòng
		{	
			switch(circle_method){ //Lựa chọn
				case 1:
					$('.slide-stage1').stop().animate({left:display_width - stage_width},anispeed);
					break;
				case 2:
					left_slide_circle();
					break;
			}
			
		}
	}
	function right_slide_scroll(){
		// Xác định xem slide có còn hình phía bên phải hay không dựa trên độ dài của stage và container
		var stage_left = Math.abs($('.slide-stage1').position().left);
		var right_remain = stage_width - (display_width + stage_left);
		
		// Nếu có
		if(right_remain > 0 && !$('.slide-stage1').is(':animated')){ //Kích hoạt chỉ khi stage ko chuyển động nữa
			$('.slide-stage1').stop().animate({left:"-=" + image_width},anispeed);
		}
		else // Nếu đã chuyển về hình ảnh đầu tiên thì lựa chọn cách thức quay vòng
		{
			switch(circle_method){ //Lựa chọn
				case 1:
					$('.slide-stage1').stop().animate({left:0},anispeed);
					break;
				case 2:
					right_slide_circle();
					break;
			}
		}
	}
	
	$('.slide-control-prev1').click(function(){left_slide_scroll();});
	$('.slide-control-next1').click(function(){right_slide_scroll();});
	
	// ========= Xử lý auto scroll ==================
	
	function start_slide_auto_scroll(){
		play = setInterval(right_slide_scroll,timeinterval);
	}
	
	// Nếu chế độ auto scroll được chọn thì sẽ kích hoạt 
	if(auto_scroll == 1){
		start_slide_auto_scroll(); 
	}
	
	// Đưa chuột vào slide và các nút sẽ tạm dừng quá trình auto scroll
	$(".slide-container1,.slide-control-prev1,.slide-control-next1").hover(function() {
		clearInterval(play);
	}, function(){
		start_slide_auto_scroll();
	});
	
})