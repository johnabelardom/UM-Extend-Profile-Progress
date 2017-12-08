
<div id="um-text-profile-progress-bar">
	<h6 style="margin: 0;">Complete</h6>
	<div class="progress-bar blue">
		<span style="width: <?= $progress . '%' ?>">
			<div class="progress-text" style="display: none;"><?= round($progress) . '%' ?></div>
		</span>
	</div>
</div>
<!-- <div class="progress-bar orange">
	<span style="width: <?= $progress . '%' ?>">
		<div class="progress-text"><?= round($progress) . '%' ?></div>
	</span>
</div> -->
<script type="text/javascript">
	setTimeout(function() {
		jQuery('.progress-text').fadeIn();
	}, 500);	
</script>

<style type="text/css">
.progress-bar {
	background-color: #ddd;
	height: 30px;
	width: 100%;
	margin: 5px 0;
	/*border-radius: 5px;*/
	/*box-shadow: 0 1px 5px #000 inset, 0 1px 0 #444;*/
}
.progress-bar span {
	display: inline-block;
	/*float: left;*/
	height: 100%;
	/*border-radius: 3px;*/
	box-shadow: 0 1px 0 rgba(255, 255, 255, .5) inset;
	/*transition: width 1s ease-in-out;
	transition-delay: 0.5s*/
	-webkit-animation: progress 2s; /* Safari 4.0 - 8.0 */
    animation: progress 2s;
	background-color: rgba(98,237,0,0.7);
}
/*.blue span {
	background-color: rgba(98,237,0,0.7);
}
.orange span {
	background-color: rgba(98,237,0,0.7);
}*/
.progress-text {
	padding: 5px;
	text-align: center;
	color: #777;
	/*margin: -25px 0px; */
	-webkit-animation: opaqueness 2s; /* Safari 4.0 - 8.0 */
	-webkit-animation-delay: 0.5s; /* Safari 4.0 - 8.0 */
    animation: opaqueness 2s;
    animation-delay: 0.5s
}

/* Safari 4.0 - 8.0 */
@-webkit-keyframes progress {
    0%   {width: 0px;}
    100% {width: <?= round($progress) . '%' ?>;}
}

/* Standard syntax */
@keyframes progress {
    0%   {width: 0px;}
    100% {width: <?= round($progress) . '%' ?>;}
}

/* Safari 4.0 - 8.0 */
/*@-webkit-keyframes opaqueness {
    0%   {opacity: 0;}
    100% {opacity: 1;}
}*/

/* Standard syntax */
/*@keyframes opaqueness {
    0%   {opacity: 0;}
    100% {opacity: 1;}
}*/

</style>