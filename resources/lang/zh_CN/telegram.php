<?php
return [
    // 用户相关
    'notregistered' => '用户未注册，请先注册！命令: /register',
    'userbanned' => '用户被禁止',
    'balance' => '余额',
    'nobalance' => '用户余额不足',
    // 今日报表
    'todayprofit' => '今日利润',
    'todayrecharge' => '今日充值',
    'todaywithdraw' => '今日提现',
    'todaysendamount' => '今日发送金额',
    'expenditure' => '支出',
    'awarding' => '奖励',
    'bagincome' => '包裹收入',
    'thunderlose' => '雷电损失',
    'inviterebate' => '邀请返利',
    'shareprofit' => '分红',

    // 昨日报表
    'yesterdayprofit' => '昨日利润',

    // 推广查询
    'todayinvite' => '今日邀请',
    'monthinvite' => '本月邀请',
    'totalinvite' => '总邀请',
    'lastteninvitations' => '显示最后十个邀请',

    // 发包
    'commanderror_integer' => '命令错误，请输入整数',
    'commanderror_thundernum' => '命令错误，雷电数字应在0到9之间',
    'error_lessthan' => '红包金额不能小于 :minAmount U',
    'error_greaterthan' => '红包金额不能大于 :maxAmount U',
    'registersuccess' => '注册成功',
    'registerfailed' => '注册失败',
    'withdrawfailed' => '提现失败',
    'rechargefailed' => '充值失败',
    'userregistered' => '用户已注册',
    'failedtosend' => '发送失败',
    'nopicture' => '请在背景中设置图片',
    'firstbtntext' => '🧧抢 [:luckyTotal/0] 总计 :amount U 💥 :mine',
    'sendcaption' => '发出了 :amount U 的红包，快来抢吧！',
    'insufficientbalance' => '您的余额不足以发包',
    'insufficientbalancetips' => '余额不足，需要的余额 >=:lowestAmount 或状态异常~',


    // 福利包
    'welfarelimit' => '福利红包的数量必须大于2且小于100',
    'welfare' => '福利',
    'welfaretoomany' => '数量过多',
    'welfarefirstbtntext' => '�&#8203;``【oaicite:0】``&#8203;】 [:num/0] 总计 :amount U',
    'welfaresendcaption' => '发送了 :amount U 的福利红包，快来抢吧！',

    // 抢包
    'grab_self' => '无法抢自己的红包',
    'receivedonce' => '你已经领取了红包，金额是 :amount U',
    'nodata' => '无数据',
    'collectedall' => '所有红包已被领完',
    'hasthunderanswer' => '踩雷了，收到 :redAmount U，损失 :loseMoney U',
    'nothunderanswer' => '💵你抢到了 :redAmount U',
    'welfareanswer' => '恭喜，你抢到了 :redAmount U',
    'welfare_envelopes' => '福利红包',
    'total' => '总计',
    'thunder' => '💥',
    'envelopes' => '红包',
    'envelopes_collect' => '🧧抢',
    'welfare_collect' => '🧧[福利] 来抢吧',
    'collect_over' => "[ <code>:sender_name</code> ]的红包已被领取！\n
🧧金额：:luckyAmount U
🛎比率：:lose_rate
💥雷：:thunder\n
--------详情--------\n
:details
💹 利润： :loseMoneyTotal
💹 金额：-:luckyAmount
💹 收到：:profitTxt",
    'welfare_collect_over' => "[ <code>:sender_name</code> ]的福利红包已被领取！\n
🧧金额：:luckyAmount U
\n
--------详情--------\n
:details
💹 金额：-:luckyAmount
",

    'leopard_reward' => "🎉🎉[ :userName ] 抢到了三张一样的 :redAmount 奖励 :leopardReward 已收到。",
    'straight_reward' => "🎉🎉[ :userName ] 抢到了顺子 :redAmount 奖励 :straightReward 已收到。",
    'jackpot_reward' => "🌟恭喜！赢得了头奖🌟\n 获奖金额 <b>:rewardAmount</b>\n 恭喜以下获奖用户：\n\n",
    'jackpot_bonus_send' => "\n 奖金已自动分发到账户，请查收~ \n",
    'jackpot_cumulative' => "🌟 头奖奖池累计金额：:amount U 🌟",

    // 过期
    'valid_returned' => '(已返回)',

    'valid_caption' => "[ <code>:sender_name</code> ]的红包已过期！\n
🧧金额：:luckyAmount U
🛎比率：:lose_rate
💥雷：:thunder\n
--------详情--------\n
:details
💹 利润： :loseMoneyTotal
💹 金额：-:luckyAmount
💹 收到：:qiangTotal
💹 剩余：:shengyuText
💹 实际收到：:profitTxt
提示：[ <code>:sender_name</code> ]的红包已过期！",
    'welfare_valid_caption' => "[ <code>:sender_name</code> ]的红包已过期！\n
🧧金额：:luckyAmount U

--------详情--------\n
:details
💹 金额：-:luckyAmount
💹 收到：:qiangTotal
💹 剩余：:shengyuText
提示：[ <code>:sender_name</code> ]的红包已过期！",


    // 上分下分
    'withdraw' => '提现',
    'recharge' => '充值',
    'withdrawerr' => '金额错误',
    'rechargeerr' => '金额错误',
    "withdrawmsg" => '✅ 提现 <b>:amount</b> 成功
🔹用户名:  <code>:username</code>
🔹用户ID: <code>:tgId</code>
🔹余额: <b>:balance</b> U',
    "rechargemsg" => '✅ 充值 <b>:amount</b> 成功
🔹用户名: <code>:username</code>
🔹用户ID: <code>:tgId</code>
🔹余额: <b>:balance</b> U',

    // 按钮
    'btn_service' => '客服',
    'btn_recharge' => '充值',
    'btn_rule' => '规则',
    'btn_balance' => '余额',
    'btn_promotion' => '推广',
    'btn_report' => '今日报告',
    'btn_invitelink' => '推广链接',
    'yesterday_report' => '昨日报告',
    'team_report' => '团队报告',


    // 邀请
    'invite_err1' => '用户未注册。请先加入群组。加入群组后，将自动注册。',
    'invite_err2' => '邀请链接创建失败！请联系管理员',
    'invite_link' => "[ :username ] 您的专属链接是 :invite_link\n(加入的用户将自动成为您的下属用户)",

    'start_msg' => "👏 欢迎来到 TG 红包雷游戏，您的 ID 是: :userId",

    'photo' => '照片',
    'groupinfo' => '群组信息',
    'group_id' => '群组 ID',
    'user_id' => '用户 ID',
    'welcome' => "{NAME}, 欢迎来到令人振奋的Red Invelope Thunder扫荡世界!

    🚀关键功能：
    1️⃣即时投注:跳过注册麻烦, 直接潜入投注的兴奋中。

    2把TG组的闪电游戏玩法: 加入我们的电报组，进行闪电快速的红色信封游戏，以保持您的肾上腺素泵送。

    3️⃣公平竞争的保证: 我们的平台在游戏中保持严格的非参与政策，以确保公平透明的环境。

    4️⃣权衡保证: 我们对公平性的承诺包括彻底称重，以确保小组游戏中的水平竞争环境。

    5️⃣即时收益, 并带有会员邀请函: 通过我们的代理模式向他人介绍刺激性 - 每一项成功的邀请都立即获得回报。现在体验匆忙！"
];
