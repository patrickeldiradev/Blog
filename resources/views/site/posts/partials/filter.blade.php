<div>
    <form>
        <select name="publication_date" id="publication_date">
            <option value="asc" @if(request()->input('publication_date') == 'asc') selected @endif>{{ __('asc') }}</option>
            <option value="desc" @if(request()->input('publication_date') == 'desc') selected @endif>{{ __('desc') }}</option>
        </select>
        <button class="btn btn-success">
            {{ __('Filter') }}
        </button>
        <a class="btn btn-danger" href="{{ route('site.post.index') }}">{{ __('Reset') }}</a>
    </form>
</div>
<br>
