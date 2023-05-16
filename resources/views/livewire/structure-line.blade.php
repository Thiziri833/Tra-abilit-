<div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Structures:</strong>
            <select wire:model="selectedStructure" class="form-control" name="structure_id">
                <option value="" selected>Choose Structure</option>
                @foreach($structures as $structure)
                    <option value="{{ $structure->id }}">{{ $structure->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    @if (!is_null($selectedStructure))
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <strong>Lines:</strong>
            <select wire:model="selectedLine" class="form-control" name="line_id">
                <option value="" selected>Choose line</option>
                @foreach($lines as $line)
                    <option value="{{ $line->id }}">{{ $line->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

@endif
   

</div>
