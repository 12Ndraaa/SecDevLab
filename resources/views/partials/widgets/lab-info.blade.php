<div class="widget-container-lab-page-status">
    <span class="{{ $lab->levelDisplayClass() }} widget-container-labelevel">{{ $lab->difficulty }}</span>
    <div class="widgetcontainer-lab-status {{ $isSolved ? 'is-solved' : 'is-notsolved' }}">
        <span>LAB</span>
        <span class="lab-status-icon">{{ $isSolved ? 'Solved' : 'Not solved' }}</span>
    </div>
</div>
