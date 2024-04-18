<?php
return [
    //用户相关
    'notregistered' => 'The user is not registered, please register first! Command: /register',
    'userbanned' => 'User was banned',
    'balance' => 'balance',
    'nobalance' => 'Insufficient user balance',
    //今日报表
    'todayprofit' => 'today profit',
    'todayrecharge' => 'today recharge',
    'todaywithdraw' => 'today withdraw',
    'todaysendamount' => 'today amount',
    'expenditure' => 'expenditure',
    'awarding' => 'awarding',
    'bagincome' => 'bag income',
    'thunderlose' => 'thunder lose',
    'inviterebate' => 'invite rebate',
    'shareprofit' => 'share profit',
    //昨日报表
    'yesterdayprofit' => 'yesterday profit',


    //推广查询
    'todayinvite' => 'Today invitations',
    'monthinvite' => 'Month invitations',
    'totalinvite' => 'Total invitations',
    'lastteninvitations' => 'Show the last ten invitations',

    //发包
    'commanderror_integer' => 'Command error, please enter an integer',
    'commanderror_thundernum' => 'Command error, the thunder number should be between 0 and 9',
    'commanderror_pendinglimit' => 'Command error: You currently have 5 pending red envelopes awaiting completion.',
    'error_lessthan' => 'The amount of red envelope cannot be less than :minAmount U',
    'error_greaterthan' => 'The amount of red envelope cannot be greater than :maxAmount U',
    'registersuccess' => 'Registration success',
    'registerfailed' => 'Registration failed',
    'withdrawfailed' => 'Withdraw failed',
    'rechargefailed' => 'Recharge failed',
    'userregistered' => 'User registered',
    'failedtosend' => 'Failed to send',
    'nopicture' => 'Please set the picture in the background',
    'firstbtntext' => '🧧Grab [:luckyTotal/0] Total :amount U 💥 :mine',
    'sendcaption' => 'Sent a :amount U red envelope, come and grab it!',
    'insufficientbalance' => 'Your balance is insufficient to issue the package',
    'insufficientbalancetips'=>'Insufficient balance, please recharge',
    // 'insufficientbalancetips'=>'Insufficient balance, balance required >=:lowestAmount Or the status is abnormal~',


    //福利包
    'welfarelimit' => 'The number of welfare red envelopes must be greater than 2 and less than 100',
    'welfare' => 'welfare',
    'welfaretoomany' => 'Too many quantities',
    'welfarefirstbtntext' => '🧧【Welfare】 [:num/0] Total :amount U ',
    'welfaresendcaption' => 'Sent a :amount U Welfare Red envelope, come and grab it!',

    //抢包
    'grab_self' => 'Unable to grab the red envelopes given by yourself',
    'receivedonce' => 'You have received the red envelope, the amount is :amount U',
    'nodata' => 'No data',
    'collectedall' => 'All red envelopes have been collected',
    'hasthunderanswer' => 'Hit by mine, receive :redAmount U, lose :loseMoney U',
    'nothunderanswer' => '💵You grabbed  :redAmount U',
    'welfareanswer' => 'Congratulations, you grabbed :redAmount U',
    'welfare_envelopes' => 'welfare envelopes',
    'total' => 'Total',
    'thunder' => '💥 ',
    'envelopes' => 'envelopes',
    'envelopes_collect' => '🧧Grab',
    'welfare_collect' => '🧧[Welfare] Come and grab it',
    'collect_over' => "[ <code>:sender_name</code> ] red envelope has been collected！\n
🧧Amount：:luckyAmount U
🛎Rate：:lose_rate
💥Thunder：:thunder\n
--------Details--------\n
:details
💹 Profit： :loseMoneyTotal
💹 Amount：-:luckyAmount
💹 Received：:profitTxt",
    'welfare_collect_over' => "[ <code>:sender_name</code> ] welfare red envelope has been collected！\n
🧧Amount：:luckyAmount U
\n
--------Details--------\n
:details
💹 Amount：-:luckyAmount
",
    'leopard_reward' => "🎉🎉[  :userName  ] Grabbing the Threes Full :redAmount Reward :leopardReward has been received.",
    'straight_reward' => "🎉🎉[  :userName  ] Grabbing the Straight :redAmount Reward :straightReward has been received.",
    'jackpot_reward' => "🌟Congratulations! Won the jackpot🌟\n Winning amount <b>:rewardAmount</b>\n Congratulations to the following winning users:\n\n",
    'jackpot_bonus_send' => "\n The bonus has been automatically distributed to the account, please check~ \n",
    'jackpot_cumulative' => "🌟 JackPot prize pool cumulative amount: :amount U 🌟",


    //过期
    'valid_returned' => '(Returned)',
    'valid_caption' => "[ <code>:sender_name</code> ]’s red envelope has expired！\n
🧧Amount：:luckyAmount U
🛎Rate：:lose_rate
💥Thunder：:thunder\n
--------Details--------\n
:details
💹 Profit： :loseMoneyTotal
💹 Amount：-:luckyAmount
💹 Received：:qiangTotal
💹 Surplus：:shengyuText
💹 Actually Received：:profitTxt
Tips：[ <code>:sender_name</code> ]’s red envelope has expired！",
    'welfare_valid_caption' => "[ <code>:sender_name</code> ]’s red envelope has expired！\n
🧧Amount：:luckyAmount U

--------Details--------\n
:details
💹 Amount：-:luckyAmount
💹 Received：:qiangTotal
💹 Surplus：:shengyuText
Tips：[ <code>:sender_name</code> ]’s red envelope has expired！",

    //上分下分
    'withdraw' => 'withdraw',
    'recharge' => 'recharge',
    'withdrawerr' => 'Amount error',
    'rechargeerr' => 'Amount error',
    "withdrawmsg" => '✅ Withdraw <b>:amount</b> Success
🔹Username:  <code>:username</code>
🔹User ID: <code>:tgId</code>
🔹balance: <b>:balance</b> U',
    "rechargemsg" => '✅ Recharge <b>:amount</b> Success
🔹Username: <code>:username</code>
🔹User ID: <code>:tgId</code>
🔹balance: <b>:balance</b> U',

    //按钮
    'btn_service' => 'Service',
    'btn_recharge' => 'Recharge',
    'btn_rule' => 'Rules',
    'btn_balance' => 'Balance',
    'btn_promotion' => 'Invitations',
    'btn_report' => 'Today report',
    'btn_invitelink' => 'Invitelink',
    'yesterday_report' => 'Yesterday report',
    'team_report' => 'team report',

    //邀请
    'invite_err1' => 'The user is not registered. Please join the group first. After joining the group, you will be automatically registered.',
    'invite_err2' => 'Invitation link creation failed! Please contact the administrator',
    'invite_link' => "[ :username ] Your exclusive link is  :invite_link
(Users who join will automatically become your subordinate users)",

    'start_msg' => "👏 Welcome to TG Red Packet Thunder Game , Your ID: :userId",

    'photo' => 'photo',
    'groupinfo' => 'groupinfo',
    'group_id' => 'Group ID',
    'user_id' => 'User ID',

    'welcome' => "{NAME}, Welcome to the exhilarating world of Red Envelope Thunder Sweep!

    🚀 Key Features:
    1️⃣ Instant Betting: Skip the registration hassle and dive straight into the excitement of betting.

    2️⃣ Lightning Gameplay in TG Group: Join our Telegram group for lightning-fast red envelope games that will keep your adrenaline pumping.

    3️⃣ Fair Play Assurance: Our platform maintains a strict policy of non-participation in the games to ensure a fair and transparent environment.

    4️⃣ Weighed Guarantee: Our commitment to fairness includes thorough weighing to guarantee a level playing field within the group games.

    5️⃣ Instant Returns with Member Invitations: Introduce others to the thrill through our agency mode – earn immediate returns with every successful invitation. Experience the rush now!",
    "commands" => "
    📢List of commands

    ¤ `/groupinfo | groupinfo` - command to display comprehensive information about a specific group.
    ¤ `balance` - command to show current balance

    ¤ /start - command to start and see if the group is working
    ¤ /help - command to see game instructions
    ¤ /invite - command to generate an invite link used to invite other users
    ¤ /register - command to register in the group
    ¤ /setLanguage - command that allows to change current language",
    "please_choose_a_language_to_set" => "PLEASE CHOOSE A LANGUAGE TO SET",
    "language_set_success" => "Language has been successfully set to :language !",
    "unauthorized_admin_only" => "Sorry, only the admin can make this request.",
    "success" => "Success",
    "error" => "Error",
    "warning" => "Warning",
    "telegram_bot_error" => "Telegram bot error",
    "telegram_bot_run_stop" => "The Telegram bot has stopped",
    "telegram_bot_run_error" => "An exception occurred during bot operation. ERROR",
    "create_cms_account" => "Kindly Create CMS Account first",
    "group_already_created" => "The group already registered.",
];
