<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/edit/<?php echo $category; ?>/<?php echo $data['id']; ?>" method="post" >
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['title'], ENT_QUOTES); ?>" name="title">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea class="form-control" rows="3" name="description"><?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?></textarea>
                            </div>
							<div class="form-group">
                                <label>Материал</label>
                                <input class="form-control" type="text" name="material" value="<?php echo htmlspecialchars($data['material'], ENT_QUOTES); ?>">
                            </div>
							<div class="form-group">
                                <label>Цвет 1(Главное изображение)</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['color_1'], ENT_QUOTES); ?>" name="color1text">
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="img">
                            </div>
							<div class="form-group">
                                <label>Цвет 2</label>
                                <input class="form-control" type="text"  value="<?php echo htmlspecialchars($data['color_2'], ENT_QUOTES); ?>" name="color2text">
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="color2img">
                            </div>
							<div class="form-group">
                                <label>Цвет 3</label>
                                <input class="form-control" type="text"  value="<?php echo htmlspecialchars($data['color_3'], ENT_QUOTES); ?>" name="color3text">
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="color3img">
                            </div>
							<div class="form-group">
                                <label>Чертежи</label>
                                <input class="form-control" multiple name = "photos[]" accept=".png, .jpg, .jpeg" type = "file" >
                            </div>
							<div class="form-group">
                                <label>Цена без скидки</label>
                                <input class="form-control" type="text" name="oldPrice" value = "<?php echo htmlspecialchars($data['old_price'], ENT_QUOTES); ?>">
                            </div>
							<div class="form-group">
                                <label>Цена со скидкой</label>
                                <input class="form-control" type="text" name="newPrice" value = "<?php echo htmlspecialchars($data['new_price'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                              <label for="sel1">Есть ли товар в наличии?</label>
                              <select class="form-control" id="sel1" name="quantity">
                                <option value="0" <? if($data['quantity']==0) echo " selected" ?>>Нет в наличии</option>
                                <option value="1" <? if($data['quantity']>0) echo " selected" ?>>В наличии</option>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>