<div class="widget-container-lab-page-status">
    <span class="{{ $lab->levelDisplayClass() }} widget-container-labelevel">{{ $lab->difficulty }}</span>
    <div class="widgetcontainer-lab-status {{ $isSolved ? 'is-solved' : 'is-notsolved' }}">
        <span>{{ __('academy.widgets.lab_badge') }}</span>
        <span class="lab-status-icon">{{ $isSolved ? __('academy.widgets.solved') : __('academy.widgets.not_solved') }}</span>
    </div>
</div>
