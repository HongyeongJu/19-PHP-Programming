<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2019-03-26
 * Time: ���� 10:00
 */
/*
 * POST�� ���޹��� �� ���
 * ���� ȯ�� ���� - PHP �������� register_globals �� Off�� �����߱� ������, �⺻ ������ POST�� GET���� ���޵� �Ķ���Ͱ� ���޵��� ����!
 * register_globals�� Off�� ������ ���, $_POST[�����̸�]�� ���ؼ�, POST�� ���޵� �Ķ���͸� ������ ���� �� ����!
 * on���� ���� ��� ���Ȼ� ������ �߻��� ���� �ִ�.
 */

echo "���̵�   : $_POST[id]<br>";
echo "�̸�     : $_POST[name]<br>";
echo "��й�ȣ  : $_POST[passwd]<br>";
echo "��й�ȣ Ȯ�� : $_POST[passwd_confirm]<br>";
echo "����  : $_POST[gender]<br>";
echo "�޴��ȣ  : $_POST[phone1] - $_POST[phone2] - $_POST[phone3]<br>";
echo "�ּ�  : $_POST[address]<br>";
echo "��ȭ����  : $_POST[movie]<br>";
echo "����  : $_POST[book]<br>";
echo "����  : $_POST[shop]<br>";
echo "�  : $_POST[sport]<br>";
echo "�ڱ�Ұ�  : $_POST[intro]<br>";
echo "����(hidden Ÿ�Կ��� ����)  : $_POST[title]<br>";
?>