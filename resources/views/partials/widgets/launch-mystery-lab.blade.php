<div id="MysteryLabWidget" class="vla-mystery-widget">
    <form method="GET" action="/web-security/mystery-lab-challenge/launch" class="vla-filter-card">
        <div class="vla-mystery-grid">
            <div class="vla-field">
                <label for="mystery-level"><strong>{{ __('academy.widgets.mystery_level') }}</strong></label>
                <select id="mystery-level" class="form-select level" name="level">
                    <option value="ANY">{{ __('academy.widgets.mystery_any') }}</option>
                    <option value="APPRENTICE">Apprentice</option>
                    <option value="PRACTITIONER" selected>Practitioner</option>
                    <option value="EXPERT">Expert</option>
                </select>
            </div>
            <div class="vla-field">
                <label for="mystery-cat"><strong>{{ __('academy.widgets.mystery_category') }}</strong></label>
                <select id="mystery-cat" class="form-select category" name="category">
                    <option value="ANY" selected>{{ __('academy.widgets.mystery_any') }}</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="vla-field vla-field--action">
                <button type="submit" class="vla-btn vla-btn--primary">{{ __('academy.widgets.mystery_submit') }}</button>
            </div>
        </div>
    </form>
</div>
