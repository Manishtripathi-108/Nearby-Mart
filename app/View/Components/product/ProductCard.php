<?php

namespace App\View\Components\product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class ProductCard extends Component
{
    public $product;
    public $finalPrice;
    public $discountLabel;

    /**
     * Create a new component instance.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->calculateFinalPriceAndDiscount();
    }

    /**
     * Calculate the final price and discount label.
     */
    protected function calculateFinalPriceAndDiscount()
    {
        if ($this->product->discount) {
            if ($this->product->discount_type == 'Fixed') {
                $this->finalPrice = number_format($this->product->price - $this->product->discount, 2);
                $this->discountLabel = '-₹' . $this->product->discount;
            } elseif ($this->product->discount_type == 'Percentage') {
                $discountAmount = ($this->product->price * $this->product->discount) / 100;
                $this->finalPrice = number_format($this->product->price - $discountAmount, 2);
                $this->discountLabel = '-' . $this->product->discount . '%';
            }
        } else {
            $this->finalPrice = number_format($this->product->price, 2);
            $this->discountLabel = null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.product-card');
    }
}
