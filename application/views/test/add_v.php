<div class="span10">
	<article>
		<h3> 테스트 추가화면 </h3>

		<form action="<?= site_url() ?>/test/add" method="post" >
			<?php echo validation_errors(); ?>
			<input type="text" name="st_id" placeholder="학생ID" class="span12" />
			<input type="text" name="grade" placeholder="학년구분" class="span12" />
			<input type="text" name="type" placeholder="시험구분" class="span12" />
			<input type="text" name="score" placeholder="점수" class="span12" />
			<textarea name="memo" placeholder="메모" class="span12" rows="15"></textarea>
			<div class="form_control">
				<input class="btn" type="submit" value="추가" />
				<a href="<?= site_url('/student/get/'.$st_id)?>" class="btn">학생 상세 목록</a>
			</div>
		</form>
	</article>
</div>