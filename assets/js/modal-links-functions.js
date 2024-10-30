function convertIntZeroToStringAuto(var num)
{
    if (num === 0) {
        return 'auto';
    } else {
        return num;
    }
}

function convertStringBoolToBool(var string)
{
    if (string === 'true') {
        return true;
    } else if (string === 'false') {
        return false;
    } else {
        return string;
    }
}

function convertStringBooltoCssDisplayValue(var string)
{
    if (string === 'true') {
        return 'block';
    } else if (string === 'false') {
        return 'none';
    } else {
        return string;
    }
}