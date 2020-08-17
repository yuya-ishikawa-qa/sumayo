<div class="col">
                        @if ((isset($holidays_list[$day->render()]) && ($holidays_list[$day->render()]) !== 1)||(empty($holidays_list[$day->render()])))
                          <input class="form-check-input" type="radio" name="{{ $day->render() }}" id="{{ $day->render() . '-0' }}" value="0" checked>
                        @else
                          <input class="form-check-input" type="radio" name="{{ $day->render() }}" id="{{ $day->render() . '-0' }}" value="0" >
                        @endif

                        <label 
                          class="form-check-label" 
                          for="{{ $day->render() . '-0' }}">
                          営業
                        </label>
                      </div>
                      
                      <div class="col">
                        @if (isset($holidays_list[$day->render()]) && ($holidays_list[$day->render()]) === 1)
                          <input class="form-check-input" type="radio" name="{{ $day->render() }}" id="{{ $day->render() . '-1' }}" value="1" checked>
                        @else
                          <input class="form-check-input" type="radio" name="{{ $day->render() }}" id="{{ $day->render() . '-1' }}" value="1">
                        @endif
                        
                        <label 
                          class="form-check-label" 
                          for="{{ $day->render() . '-1' }}">
                          休み
                        </label>
                      </div>