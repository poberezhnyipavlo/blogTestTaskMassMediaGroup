<label for="">Назва</label>
<input type="text" class="form-control" name="name" value="{{ $category->name ?? '' }}">
<label for="">Опис</label>
<textarea class="form-control" name="description">
    {{ $category->description ?? '' }}
</textarea>

<input class="btn btn-primary" type="submit" value="Зберегти">
