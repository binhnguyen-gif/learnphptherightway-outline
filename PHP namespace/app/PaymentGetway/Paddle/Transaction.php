<?php

declare(strict_types=1);

namespace App\PaymentGetway\Paddle;

use App\Enums\Status;

class Transaction
{

//    Biến tĩnh sẽ không được liên kết với mỗi đối tượng
    public static int $count = 0;

//    public const STATUS_PAID = 'paid';
//    public const STATUS_PENDING = 'pending';
//    public const STATUS_DECLINED = 'declined';
//
//    public const ALL_STATUSES = [
//      self::STATUS_PAID => 'Paid',
//      self::STATUS_PENDING => 'pending',
//      self::STATUS_DECLINED => 'declined',
//    ];

    private string $status;

    public function __construct()
    {
//        var_dump(new CustomerProfile());
//        var_dump(new DateTime());
//        Ten day du
//        var_dump(new \Notification\Email());
//
//        var_dump(new Email());
//        var_dump(\explode(',', 'hello,word'));
//        var_dump(Transaction::STATUS_PAID);
//        self tham chiếu đến lớp hiện tại nên nó tương tự biến $this đề cập ến gọi đối tượng như self
        //self đề cập đến lớp hiện tại hoặc lớp mà nó được gọi
//        có nhiều điểm khác biệt hơn giữa self và $this
//        toán tử phân giải phạm vi ::
//        từ khóa self đề cập đến lớp hiện tại
//        var_dump(self::STATUS_PAID);
//        var_dump($this::STATUS_PAID);
//
//        $this->setStatus(self::STATUS_PENDING);
        $this->setStatus(Status::STATUS_PENDING);
    }

    public function setStatus(string $status): self
    {
        if (!Status::ALL_STATUSES[$status]) {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->status = $status;

        return $this;
    }

}

function explode($seper, $str)
{
    return 'foo';
}