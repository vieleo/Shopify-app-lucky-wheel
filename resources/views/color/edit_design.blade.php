<?php
    $config = json_decode($wheel->configall);
?>
    <div class="lk-design">
        @foreach ($config as $key => $color)
                  @if($key == 'color')
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="">Color Border Lucky</label>
                    <input type="color" name="background" id="background" value="{{ $color->background }}" title="Choose your color" oninput="edValuebackground()">
                </li>

                <li class="list-group-item">
                    <label for="">Cover Text</label>
                    <input type="color" name="converText" id="converText" value="{{ $color->converText }}" title="Choose your color" oninput="edValueconverText()">
                </li>

                <li class="list-group-item">
                    <label for="">Cuppon Text</label>
                    <input type="color" name="cupponText" id="cupponText" value="{{ $color->cupponText }}" title="Choose your color" oninput="edValuecupponText()">
                </li>

                <li class="list-group-item">
                    <label for="">Button</label>
                    <input type="color" name="buttonColor" id="buttonColor" value="{{ $color->buttonColor }}" title="Choose your color" oninput="edValuebuttonColor()">
                </li>

                <li class="list-group-item">
                    <label for="">Button Text</label>
                    <input type="color" name="buttonText" id="buttonText" value="{{ $color->buttonText }}" title="Choose your color" oninput="edValuebuttonText()">
                </li>

                <li class="list-group-item">
                    <label for="">Button Shadow</label>
                    <input type="color" name="buttonShadow" id="buttonShadow" value="{{ $color->buttonShadow }}" title="Choose your color" oninput="edValuebuttonShadow()">
                </li>

                <li class="list-group-item">
                    <label for="">Content Background Color</label>
                    <input type="color" name="contentBgr" id="contentBgr" value="{{ $color->contentBgr }}" title="Choose your color" oninput="edValuepopupBackground()">
                </li>

                <li class="list-group-item">
                    <label for="">Content Background Shadow</label>
                    <input type="color" name="contentshadow" id="contentshadow" value="{{ $color->contentshadow }}" title="Choose your color" oninput="edValuedisclaimerText()">
                </li>

                <li class="list-group-item">
                    <label for="">Disclaimer Text</label>
                    <input type="color" name="disclaimerText" id="disclaimerText" value="{{ $color->disclaimerText }}" title="Choose your color" oninput="edValuedisclaimerText()">
                </li>

            </ul>
            @endif
            @endforeach
</div>

