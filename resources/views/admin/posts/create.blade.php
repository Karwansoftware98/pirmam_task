<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title"  />
            <x-form.input name="slug"  />
            <x-form.textarea name="excerpt"  />
            <x-form.textarea name="body"  />

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" >
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>
            <div class="flex justify-end">
                <x-button1>Publish</x-button1>

            </div>
        </form>
    </x-setting>
</x-layout>
