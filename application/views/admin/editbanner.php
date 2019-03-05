<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">Изменение баннеров на главное странице.</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/editbanner" method = "post" enctype="multipart/form-data">                  
                            <div class="form-group">
                                <label>Баннер №1</label>
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="banner1">
                            </div>
                            <div class="form-group">
                                <label>Баннер №2</label>
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="banner2">
                            </div>
							<div class="form-group">
                                <label>Баннер №3</label>
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="banner3">
                            </div>

							
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>