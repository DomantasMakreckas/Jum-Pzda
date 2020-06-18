<table>
    <tbody>
    <tr>
        <?php foreach ($data['head'] ?? [] as $header): ?>
            <th><?php print $header ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($data['rows'] ?? [] as $row_id => $row): ?>
        <tr>
            <?php foreach ($row ?? [] as $col_value): ?>
                <td><?php print $col_value ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>