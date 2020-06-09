<table>
    <tbody>
    <tr>
        <?php foreach ($table['head'] ?? [] as $header): ?>
            <th><?php print $header ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($table['rows'] ?? [] as $row_id => $row): ?>
        <tr>
            <?php foreach ($row ?? [] as $col_value): ?>
                <td><?php print $col_value ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>