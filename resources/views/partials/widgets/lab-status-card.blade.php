<div class="widgetcontainer-lab-link {{ $isSolved ? 'is-solved' : 'is-notsolved' }}" id="{{ $lab->id }}" data-lab-id="{{ $lab->id }}">
    <span>LAB</span>
    <div class="flex-columns">
        <span class="{{ $lab->difficulty_class }}">{{ $lab->difficulty }}</span>
        <a href="{{ $lab->href }}">{{ $lab->title }}</a>
    </div>
    <span class="lab-status-icon">{{ $isSolved ? 'Solved' : 'Not solved' }}</span>
</div>
