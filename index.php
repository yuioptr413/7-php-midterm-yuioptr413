<?php include 'header.php'; ?>

<?php
$products = [
    [
        'name' => '키보드',
        'price' => 30000,
        'stock' => 10
    ],
    [
        'name' => '마우스',
        'price' => 15000,
        'stock' => 3
    ],
    [
        'name' => '모니터',
        'price' => 120000,
        'stock' => 0
    ]
];

// 재고 상태 메시지
function getStockMessage($stock)
{
    if ($stock >= 5) {
        return "재고 충분";
    } elseif ($stock >= 1) {
        return "재고 부족";
    } else {
        return "품절";
    }
}

// 재고 상태 색상 클래스
function getStockClass($stock)
{
    if ($stock >= 5) {
        return "good";
    } elseif ($stock >= 1) {
        return "low";
    } else {
        return "out";
    }
}

$totalValue = 0;
?>

<table>
    <tr>
        <th>상품명</th>
        <th>가격</th>
        <th>재고</th>
        <th>재고 상태</th>
    </tr>

     <?php foreach ($products as $product): ?>
        <?php
            $subtotal = $product['price'] * $product['stock'];
            $totalValue += $subtotal;
        ?>
        <tr>
            <td><?= $product['name'] ?></td>
            <td><?= number_format($product['price']) ?>원</td>
            <td><?= $product['stock'] ?></td>
            <td class="<?= getStockClass($product['stock']) ?>">
                <?= getStockMessage($product['stock']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="summary">
    <p>총 상품 수: <?= count($products) ?>개</p>
    <p>총 재고 금액: <?= number_format($totalValue) ?>원</p>
</div>

<?php include 'footer.php'; ?>