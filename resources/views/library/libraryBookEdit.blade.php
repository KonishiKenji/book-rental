@extends('layouts.main')

@section('contents')
	<div id="area-book-list" class="area content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="header">
            	<h4 class="title">Book Info</h4>
						</div>
						<div class="content">
	            <div class="textBefore">
								<?php if ($userName == "administrator") : ?>
									<h3>Before editing</h3>
								<?php endif; ?>
	              <h5>■Book Name</h5>
	              <span class="inputData">
	                <?php echo $book->name; ?>
	              </span>
	            </div>
							<?php if ($userName == "administrator") : ?>
								<form method="post" action="{{ url('library/bookUpdate')}}">
									{{ csrf_field() }}
									<!-- 更新前の商品名のID情報を更新時に使用するため -->
									<input type="hidden" name="beforeBookId" value=<?php echo $book->id; ?>>
									<!-- 更新前の商品名のID情報を更新時に使用するため -->
									<div class="textAfter">
										<h3>After editing</h3>
										<h5>■Book Name</h5>
										<div class="form-group">
											<input type="text" class="form-control" name="inputBookName" aria-describedby="nameHelp" placeholder="<?php echo $book->name; ?>">
										</div>
									</div>
									<button type="submit" class="btn btn-success" id="submitBtn">Update</button>
								</form>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
