@if( !empty( $rsUpload ))
	<?php $i = 0; ?>
	<ul>
	@foreach( $rsUpload as $tmp)
	<?php $i++; ?>
	<li>
		<div class="register-avata" style="background: url('{{ Helper::showImage("/public/uploads/".$tmp['image_path']) }}') no-repeat scroll 0% 0%; background-color: transparent; background-size: 94px 94px;">
				<a href="javascript:void(0)" class="upload-item-delete remove-image" data-value="{{ $tmp['image_path'] }}"></a>
				<input type="hidden" name="image_list[]" value="{{ $tmp['image_path'] }}">			      
		</div>
	</li>
	@endforeach
	</ul>
@endif