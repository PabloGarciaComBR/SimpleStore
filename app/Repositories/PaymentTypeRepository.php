<?php

namespace SimpleStore\Repositories;

use SimpleStore\Models\PaymentType;

class PaymentTypeRepository extends BaseRepository
{
    protected $modelClass = PaymentType::class;

    /**
     * Get countries list in id => name format
     *
     * @return array
     */
    public function getPaymentTypes()
    {
        $types = $this->pluck('name', 'id');
        return is_object($types) ? $types->toArray() : [];
    }
}
