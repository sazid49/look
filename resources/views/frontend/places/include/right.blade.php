@if ($place->published == 1)
<div class="row">
	<div class="col-md-12">
		<div class="card text-left">
			<div class="card-body">
				<h4>Offre gratuite</h4>
				<hr>
				<div class="form-group">
					<label for="exampleInputEmail1">Prénom</label>
					<input type="email" class="form-control" id="exampleInputEmail1"
						aria-describedby="emailHelp" placeholder="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Nom</label>
					<input type="text" class="form-control"
						id="exampleInputPassword1" placeholder="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">E-Mail</label>
					<input type="text" class="form-control"
					id="exampleInputPassword1" placeholder="">
				</div>
				<div class="form-group text-center">
					<button class="btn btn-primary col-md-12 text-center">
						<i class="fa fa-send"></i>
						Envoyer
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="card text-left">
			<div class="card-body">
				<?php if( !empty( $opening_hours ) ):?>
					<div class="card mb-4">
						<div class="card-header  subtitle border-bottom pb-3 d-flex align-items-center">
							<h5>{{__('labels.company.opening_hours')}}</h5>
						</div>
						<div class="boxed-widget card-body">

						<?php if( $is_open ): ?>
							<div class="listing-badge right-badge now-open"><div class="badge-text"><?php echo trans('open');?></div></div>
						<?php else: ?>
							<div class="listing-badge right-badge now-closed"><div class="badge-text"><?php echo trans('closed');?></div></div>
						<?php endif; ?>

							<ul class="day-list list-unstyled">
							<?php

								$text_open_class = "text-success";
								$text_closed_class = "text-danger";
								$text_bold_class = "font-weight-bold";

								foreach( $openHoursDisplayArray as $day_name=>$day_data):
									$open_this_day_class = false;
									$morning_open_class = false;

									$is_open = $day_data['is_open']??false;
									$is_open_from_yesterday = $day_data['is_open_from_yesterday']??false;
									$is_today = $day_data['is_today'];
									$is_yesterday = $day_data['is_yesterday'];

									$highlight_dayname
										=
										( $is_open && !($is_open_from_yesterday) )
										||
										( $is_open_from_yesterday &&  $is_yesterday)
									;

									$show_text_bold_class =  $is_today || ( $is_open_from_yesterday &&  $is_yesterday);
									?>

								<li>
									<div>
										<h5 class="day <?php echo $highlight_dayname ? $text_open_class : ( $is_today ? $text_closed_class : '' );?>">
											<?php echo trans($day_name); ?>
										</h5>
									</div>
									<div>
										<?php if(isset($day_data["open_hours"])):?>
											<?php foreach($day_data["open_hours"] as $open_hours):?>
												<div class="mb-1 <?php echo  $show_text_bold_class ? $text_bold_class : '';?>">
													<?php echo $open_hours['start'];?> - <?php echo $open_hours['end'];?>
												</div>
											<?php endforeach;?>
										<?php else: ?>
											<?php //if $day_name = today and is closed;?>
											<div class="mb-1 <?php echo $show_text_bold_class ? $text_bold_class : ''?>">
												<span><?php echo trans( 'closed' );?></span>
											</div>
										<?php endif;?>
									</div>

								</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>

				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
@endif