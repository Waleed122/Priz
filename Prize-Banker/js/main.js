var defaultPostion = 14;
var target = 14;
var loginInProcess = false;
var loginOpen = false;
var lastOffset = 0;

$(document).ready(
	function(){
		$(".fady").fadeTo("fast",0.5);
		$(".fady").mouseover(
			function(){
				$(this)
					.clearQueue()
					.fadeTo("slow", 1);
				}
			);
		$(".fady").mouseout(
			function(){
				$(this)
					.clearQueue()
					.fadeTo("slow", 0.5);
				}
			);
		$("#menu ul li").mouseout(
			function(){
				slideMenuBG(defaultPostion);
			}
		);
		$("#menu ul li").click(
			function(){
				defaultPostion = target;
			}
		);
		
		//$("#screen").coinslider({ width: 812, height: 305, navigation: true, delay: 5000, sDelay: 25, links: true});
		$("#loginBox").css(
			{
				"left": ($(window).width())+"px"
			}
		);
		//$("marquee").marquee("marquee");			
	}
)

function slideMenuBG(to){
	target = to;
	$("#menu")
		.clearQueue()
		.animate(
			{backgroundPosition: to+"px 0px"}
		);
}

