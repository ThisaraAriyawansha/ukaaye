<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'From what age can babies start eating Aromat products?',
                'answer'   => '<p>All Aromat products are specially designed for babies from <strong>6 months</strong> onward, in line with WHO and Sri Lankan Ministry of Health guidelines for starting complementary feeding.</p>',
            ],
            [
                'question' => 'Are Aromat products free from added sugar and harmful additives?',
                'answer'   => '<p>Yes! We are committed to <strong>no added sugar</strong>, no artificial colours, flavours, preservatives, or harmful additives. Our focus is on natural, wholesome ingredients suitable for little ones.</p>',
            ],
            [
                'question' => 'Is Aromat baby food organic?',
                'answer'   => '<p>We use carefully selected natural and organic-grade ingredients wherever possible. While not all products carry official organic certification yet, we prioritize clean, safe, and high-quality raw materials sourced responsibly.</p>',
            ],
            [
                'question' => 'What ingredients do you use in your baby cereals and porridge?',
                'answer'   => '<p>Our cereals feature local Sri Lankan superfoods such as <strong>kurakkan (finger millet)</strong>, red rice, rice flour, dhal, and natural fruit powders — gentle on tiny tummies and rich in natural nutrition.</p>',
            ],
            [
                'question' => 'Do you deliver to Tangalle, Galle, Matara, or other areas in the South?',
                'answer'   => '<p>Yes! We deliver island-wide, including <strong>Tangalle, Galle, Matara, Hambantota</strong>, and all other districts. Free delivery is available on orders above LKR 5,000 (delivery charges may apply for smaller orders).</p>',
            ],
            [
                'question' => 'Are Aromat products suitable for babies with allergies?',
                'answer'   => '<p>We do not add common allergens unnecessarily, but always check the label for specific ingredients. Start with small amounts and introduce one new product at a time. Consult your paediatrician if your baby has known allergies.</p>',
            ],
            [
                'question' => 'Where is Aromat baby food manufactured?',
                'answer'   => '<p>Aromat is proudly <strong>made in Sri Lanka</strong> — manufactured right here in <strong>Piliyandala</strong>. We combine local production with careful import of select quality ingredients to keep prices affordable for Sri Lankan families.</p>',
            ],
            [
                'question' => 'Can I use Aromat date powder or honey for babies?',
                'answer'   => '<p>Our date powder is suitable from <strong>6 months</strong> as a natural sweetener alternative. Pure honey is recommended only from <strong>12 months</strong> onward (due to general infant botulism risk). Always follow age guidelines on packaging.</p>',
            ],
            [
                'question' => 'Are your baby curry mixes mild enough for young children?',
                'answer'   => '<p>Yes — our baby curry mixes are specially formulated to be <strong>very mild</strong>, with no chilli or strong spices. They use gentle Sri Lankan flavours like turmeric, coriander, and coconut to introduce taste safely.</p>',
            ],
            [
                'question' => 'Why is Aromat more affordable than imported baby food?',
                'answer'   => '<p>By manufacturing locally in Piliyandala and keeping packaging simple, we eliminate high import costs and pass the savings directly to Sri Lankan parents — premium nutrition at an accessible price.</p>',
            ],
            [
                'question' => 'Do your products help with healthy growth and development?',
                'answer'   => '<p>Absolutely. Our range (cereals, puffs, yogurts, drinks) is crafted with iron-rich grains, natural vitamins from fruits, probiotics in yogurt, and balanced nutrition to support brain development, immunity, and overall growth.</p>',
            ],
            [
                'question' => 'How can I contact Aromat for more information or orders?',
                'answer'   => '<p>You can reach us via our website, Facebook/Instagram, or WhatsApp. We\'re happy to help with product questions, orders, or advice for your little one!</p>',
            ],
        ];

        foreach ($faqs as $data) {
            Faq::updateOrCreate(
                ['question' => $data['question']],
                [
                    'answer' => $data['answer'],
                    'status' => true,
                ]
            );
        }

        $this->command->info('Aromat FAQs seeded successfully! (' . count($faqs) . ' questions)');
    }
}