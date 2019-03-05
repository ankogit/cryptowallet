<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/addpost" method = "post" enctype="multipart/form-data">                  
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" name="title">
                            </div>

							<div class="form-group">
                                <label>Изображение</label>
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="postImg">
                            </div>
                            <div class="form-group">
                                <label>Категория:</label>
                                <input class="form-control" type="text" name="category">
                            </div>
                            <div class="form-group">
                                <label>Цена:</label>
                                <input class="form-control" type="text" name="price">
                            </div>
                            <div class="form-group">
                                <label>Описание:</label>
                                <textarea class="form-control" cols="30" rows="10" name="descr"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Вес:</label>
                                <input class="form-control" type="text" name="weight">
                            </div>
                            <div class="form-group">
                                <label>Начинка:</label>
                                <input class="form-control" type="text" name="filling">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>