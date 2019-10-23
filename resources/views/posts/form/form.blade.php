<label for="">Назва</label>
<input type="text" class="form-control" name="name" value="{{ $post->name ?? '' }}">
<label for="">Контент</label>
<textarea class="form-control" name="content">
    {{ $post->content ?? '' }}
</textarea>
<label>Виберіть категорію</label>
<select name="category_id" class="form-control">
    @foreach($categories as $category)
        <?php /** @var \App\Category $category */ ?>
        <option value="{{ $category->id }}"
                @if($category->id == $post->category_id) selected @endif>{{ $category->name }}</option>
    @endforeach
</select>

<label for="">Виберіть файл</label>
<input type="file" class="form-control-file" name="file">

<input class="btn btn-primary" type="submit" value="Зберегти">
