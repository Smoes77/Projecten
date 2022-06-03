module.exports.run = async (client, message, args) => {

    var statusText = args.join(" ");

    client.user.setPresence({

        status: "online",
        activities: [
            {
                name: statusText
            }
        ]

    })

    return;

}

module.exports.help = {
    name: "status",
    category: "general",
    description: "Status voor de bot"
    
}