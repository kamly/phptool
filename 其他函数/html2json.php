<?php

class MyHtml2Json
{
    // html to json
    public function html2json($html, $encoding = 'UTF-8')
    {
        $dom = new \DOMDocument();
        $html = str_replace("\n", '', str_replace("\r\n", '', $html)); // 替换多余的换行符

        // 设置编码格式
        $meta = "<?xml encoding='{$encoding}'>";
        $dom->loadHTML($meta . $html);

        // 进行 eleement to array 转换
        $returnobj = $this->element2obj($dom->documentElement);

        // 删除第一个元素（html）
        $return = [];
        if (isset($returnobj['children'][0]['children']) && !empty($returnobj['children'][0]['children'])) {
            $return = $returnobj['children'][0]['children'];
        }

        return $return;
    }

    // element to obj (核心)
    private function element2obj($element)
    {
        $obj = array("name" => str_replace('section', 'span', $element->tagName));

        // 遍历属性
        foreach ($element->attributes as $attribute) {
            if (in_array($attribute->name, ['span', 'width', 'alt', 'src', 'height', 'width', 'start', 'type', 'colspan', 'rowspan', 'style', 'class'], true) && trim($attribute->value) != '') {
                $obj['attrs'][$attribute->name] = $attribute->value;
                if ($attribute->name == 'src') { // 如果是图片则让他的最大尺寸不要超过100%
                    $obj['attrs']['style'] = 'margin: 0px; padding: 0px; max-width: 100%;max-height:100%';
                }
            }
        }

        // 进入子节点
        foreach ($element->childNodes as $subElement) {
            if ($subElement->nodeType == XML_TEXT_NODE) { // text节点
                if (trim($subElement->wholeText) != '') { // 屏蔽为空的text节点
                    $obj["children"][] = ['type' => 'text', 'text' => $subElement->wholeText];
                }
            } else {
                $obj["children"][] = $this->element2obj($subElement);
            }
        }
        return $obj;
    }
}

// php 其他函数/html2json.php

$htmlString = '<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Helvetica, &quot;Hiragino Sans GB&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);"><img src="http://nbot-pub.nosdn.127.net/bed3f947cfc79f7aea876b71215ea2c3.gif" style="box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; margin: 20px 0px;"/></p><p>123</p>';

$html2json = new MyHtml2Json();
var_dump(json_encode($html2json->html2json($htmlString)));
