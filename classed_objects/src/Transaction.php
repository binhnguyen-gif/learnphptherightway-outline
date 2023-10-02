<?php

declare(strict_types=1);

class Transaction
{
    private float $amount;
    private string $description;
//   Được gọi mỗi khi một đối tượng mới được tạo
// Nó có thể chấp nhận những đối số
//argument
    public function __construct(float $amount, string $description)
    {
//       Gán các giá trị này cho các thuộc tính để truy cập các thuộc tính của đối tượng hoặc lớp trọng chinh lớp đó
//        $this để cập đến phiên bản mà phương tức được gọi
        $this->amount = $amount;
        $this->description = $description;
    }

//    public function addTax(float $rate) {
//        $this->amount += $this->amount * ($rate / 100);
//    }
//
//    public function applyDiscount(float $rate) {
//        $this->amount -= $this->amount * ($rate / 100);
//    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getDescription()
    {
        return $this->description;
    }

//    method chanining xâu chuỗi các phương thức
// CHỉ định kiểu dữ liệu là Transaction hoặc sử dụng từ khóa self
    public function addTax(float $rate): Transaction
    {
        $this->amount += $this->amount * ($rate / 100);
//        Tham chiếu đến đối tượng gọi là thể hiện của lớp Transaction
        return $this;
    }
//    không phải lúc nào phương thức xâu chuỗi cũng có ý nghĩa
// Các phương thức xâu chuỗi sẽ không có ý nghĩa chúng tả phải hoàn thuế ở phương thức dưới
    public function applyDiscount(float $rate): Transaction
    {
        $this->amount -= $this->amount * ($rate / 100);

        return $this;
    }
//Class destructor
    //Hàm hủy gọi bất cứ khi nào không còn tham chiếu nào cho đối tượng haowjc khi đói tượng bị hủy

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}
