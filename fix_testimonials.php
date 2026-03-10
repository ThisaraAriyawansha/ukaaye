<?php
$file = __DIR__ . '/resources/views/frontend/home/testimonials.blade.php';
$content = file_get_contents($file);

$startMarker = '                                <?php';
$endMarker   = '<?php endforeach; ?>';

$start = strpos($content, $startMarker);
$end   = strpos($content, $endMarker) + strlen($endMarker);

if ($start === false || $end === false) {
    echo "Markers not found!\n";
    exit(1);
}

$replacement = '                                @foreach ($homeTestimonials as $testimonial)
                                    <div class="item-quote" data-dot="">
                                        <div class="heading">
                                            <div class="left fx">
                                                <div class="box-avt" style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; border: 3px solid #f8c146; flex-shrink: 0;">
                                                    <img src="{{ $testimonial->image_url }}"
                                                         alt="{{ $testimonial->name }}"
                                                         style="width: 100%; height: 100%; object-fit: cover; display: block;">
                                                </div>
                                                <ul style="margin-left: 15px;">
                                                    <li><h4 class="name-author clr-pri-2">{{ $testimonial->name }}</h4></li>
                                                    <li><p class="clr-pri-5 f-mulish">{{ $testimonial->position }}</p></li>
                                                </ul>
                                            </div>
                                            <div class="right">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="91" height="71" viewBox="0 0 91 71">
                                                    <g>
                                                        <image width="91" height="71" xlink:href="data:img/png;base64,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"/>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="wrap">
                                            <p class="clr-pri-2">{{ $testimonial->message }}</p>
                                        </div>
                                    </div>
                                @endforeach';

$newContent = substr($content, 0, $start) . $replacement . substr($content, $end);
file_put_contents($file, $newContent);
echo "Done! New size: " . strlen($newContent) . " bytes\n";
