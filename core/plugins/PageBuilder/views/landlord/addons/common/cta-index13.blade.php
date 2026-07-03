{{-- CTA Index-13 Style - Fallback view --}}
<section class="cta-area" style="background: linear-gradient(45deg, #e0f7e9, #b8e6dc); padding: 80px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h2 class="title">{{ $data['title'] ?? 'Automate Repetitive Tasks,' }} <br>
                    <span style="color: #178d72;">{{ $data['title_highlight'] ?? 'Collaborate Seamlessly' }}</span>
                </h2>
                <p>{{ $data['subtitle'] ?? '' }}</p>
            </div>
            <div class="col-lg-5 text-center">
                <a href="{{ $data['button_url'] ?? '#' }}" class="btn btn-primary">{{ $data['button_text'] ?? 'Start a free trial' }}</a>
                <p class="mt-2">{{ $data['button_subtext'] ?? 'No credit card required!' }}</p>
            </div>
        </div>
        @if(!empty($data['cta_image']))
            <div class="row mt-4">
                <div class="col-12">
                    {!! render_image_markup_by_attachment_id($data['cta_image'], 'Dashboard', 'full', false) !!}
                </div>
            </div>
        @endif
    </div>
</section>

